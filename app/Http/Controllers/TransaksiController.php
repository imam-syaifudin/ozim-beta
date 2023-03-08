<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DetailTransaksi;
use App\Models\Product;
use App\Models\Transaksi;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        //

        if (auth()->user()->role !== 'admin') {
            return abort(403);
        }

        $transaksi = Transaksi::paginate(5);
        $pemasukan = 0;

        foreach( Transaksi::all() as $val ){
            $pemasukan += $val->total_bayar;
        }

        return view('transaksi.index', compact('transaksi','pemasukan'));
    }

    public function detailTransaksi($id)
    {

        $detail = DetailTransaksi::where('transaksi_id', $id)->get();

        if (auth()->user()->role != 'admin') {
            if( $detail[0]->transaksi->user_id != auth()->user()->id ){
                return abort(403);
            }            
        }

        return view('transaksi.detail', compact('detail'));
    }

    public function transaksiUser($id)
    {
        if (auth()->user()->role !== 'customer') {
            return abort(403);
        }
        if (auth()->user()->id != $id) {
            return abort(403);
        }
        $transaksi = Transaksi::where('user_id', $id)->paginate(5);

        return view('transaksi.customer', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        $totalBayar = 0;

        // isi total bayar
        foreach ($cart as $c) {
            $totalBayar += $c->stok * $c->product->harga;
        }

        try {
            $cost = RajaOngkir::ongkosKirim([
                'origin'        => $request->city_origin, // ID kota/kabupaten asal
                'destination'   => $request->city_destination, // ID kota/kabupaten tujuan
                'weight'        => $request->weight, // berat barang dalam gram
                'courier'       => 'jne' // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
            ])->get();

            $ongkir = $cost[0]['costs'][0]['cost'][0]['value'];

            $transaksi = Transaksi::create([
                'user_id' => auth()->user()->id,
                'ongkir' => $ongkir,
                'nama_pembeli' => auth()->user()->name,
                'total_bayar' => $totalBayar + $ongkir,
                'alamat_pembeli' => auth()->user()->alamat,
                'id_pesanan' => strtoupper(uniqid()),
                'status' => 'belum lunas'
            ]);

            foreach ($cart as $c) {
                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'nama_product' => $c->product->name,
                    'harga' => $c->product->harga,
                    'qty' => $c->stok
                ]);
            }

            

            return view('pembayaran.proses', compact('transaksi', 'totalBayar'));
        } catch (Exception $eror) {
            return redirect('/cart')->with('error', 'Pembayaran sedang error coba lagi nanti');
        }
    }

    public function bayar(Request $request)
    {

        $user = User::find($request->user_id);
        $detail_transaksi = DetailTransaksi::where('transaksi_id', $request->transaksi_id)->get();
        $transaksi = Transaksi::find($request->transaksi_id);

        foreach ($detail_transaksi as $detail) {
            $getProduct = Product::where('name', $detail->nama_product)->first();
            $getProduct->update(['stok' => $getProduct->stok - $detail->qty]);
        }

        $user->cart()->delete();
        $transaksi->update(['status' => 'lunas']);

        return redirect('/dashboard/cart')->with('success', 'Pembayaran Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
        $transaksi->detailtransaksi()->delete();
        $transaksi->delete();


        return redirect('/dashboard/cart')->with('error', 'Transaksi Dibatalkan');
    }
}
