<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cart = Cart::where('user_id',auth()->user()->id)->get();
        $totalBayar = 0;

        // isi total bayar
        foreach( $cart as $c ){
            $totalBayar += $c->stok * $c->product->harga;
        }

        return view('cart.index',compact('cart','totalBayar'));
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
        
        Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->productid,
            'stok' => $request->stok
        ]);

        return redirect()->back()->with('success', 'product berhasil ditambahkan di cart');


    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
        return view('cart.edit',compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
        $cart->update($request->all());
        return redirect('/dashboard/cart');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
        $cart->delete();
        return redirect()->back()->with('success', 'product berhasil dihapus dari cart');
    }
}
