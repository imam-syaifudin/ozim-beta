<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function productCari(Request $request){
        $keyword = $request->keyword;

        $product = Product::where('name','like', '%' . $keyword . '%')
                          ->orWhere('harga','like', '%' . $keyword . '%')
                          ->orWhere('stok','like', '%' . $keyword . '%')
                          ->orWhere('kategori','like', '%' . $keyword . '%')
                          ->orWhere('deskripsi','like', '%' . $keyword . '%')
                          ->paginate(5)
                          ->withQueryString();
                           
        return view('product.index',compact('product'));
    }

    public function index()
    {
        //
        $product = Product::paginate(5);
        return view('product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Product::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'gambar' => $request->file('gambar')->store('product-images'),
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
        ]);
        // $create['gambar'] = $request->file('gambar')->store('product-images');

        return redirect('/dashboard/product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $gambar = $product->gambar;

        if( $request->file('gambar') != null ) {
            Storage::delete($product->gambar);
            $gambar = $request->file('gambar')->store('product-images');
        } 

        $product->update([
            'user_id' => $product->user_id,
            'name' => $request->name,
            'gambar' => $gambar,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
        ]);
        // $create['gambar'] = $request->file('gambar')->store('product-images');

        return redirect('/dashboard/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        Storage::delete($product->gambar);
        $product->delete();

        return redirect('/dashboard/product');
    }
}
