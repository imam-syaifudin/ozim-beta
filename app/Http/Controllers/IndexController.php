<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //

    public function productCari(Request $request){
        $keyword = $request->keyword;

        $product = Product::where('name','like', '%' . $keyword . '%')
                          ->orWhere('harga','like', '%' . $keyword . '%')
                          ->orWhere('stok','like', '%' . $keyword . '%')
                          ->orWhere('kategori','like', '%' . $keyword . '%')
                          ->orWhere('deskripsi','like', '%' . $keyword . '%')
                          ->paginate(9)
                          ->withQueryString();
                           
        return view('index',compact('product'));
    }

    public function index(){


        $product = Product::paginate(9);
        
        return view('index',compact('product'));

    }

    public function productShow($id){

        $product = Product::findOrFail($id);
        $productInCard = false;
        

        if( auth()->user() ){
            if ( Cart::where('user_id',auth()->user()->id)->where('product_id',$product->id)->first() !== null ){
                $productInCard = true;
                $cart = Cart::where('user_id',auth()->user()->id)->where('product_id',$product->id)->first();
                return view('view',compact('product','productInCard','cart'));
            }
        }

        return view('view',compact('product','productInCard'));

    }

    public function login(){

        return view('login');
    }
    
    public function register(){

        return view('register');
    }
}
