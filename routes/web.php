<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckOngkirController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();


// Index Page Routes
Route::get('/', [IndexController::class, 'index']);
Route::get('/index', [IndexController::class, 'index']);
Route::get('/product/{id}/show', [IndexController::class, 'productShow'])->name('product.show.index');
Route::get('/product/cari', [IndexController::class, 'productCari']);
// Login Register
Route::get('/login', [IndexController::class, 'login']);
Route::get('/register', [IndexController::class, 'register']);


Route::group(['middleware' => 'auth'], function () {

    // Auth Routes
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard/profile/{id}', [HomeController::class, 'profile'])->name('profile');
    Route::post('/dashboard/profile//{id}', [HomeController::class, 'profileUpdate'])->name('profile.edit');

    route::get('/dashboard/transaksi/detail/{id}',[TransaksiController::class,'detailTransaksi']);
    route::get('/dashboard/transaksi/customer/{id}',[TransaksiController::class,'transaksiUser']);
    
    Route::resource('/dashboard/transaksi',TransaksiController::class);

    Route::group(['middleware' => 'isadmin'], function () {
        // Admin Routes
        Route::get('dashboard/product/cari', [ProductController::class, 'productCari']);
        Route::resource('dashboard/product', ProductController::class);
    });
    Route::group(['middleware' => 'iscustomer'], function () {
        // Customer Routes
        Route::get('/ongkir', [CheckOngkirController::class,'index'])->name('check.ongkir');
        Route::post('/ongkir', [CheckOngkirController::class,'check_ongkir']);

        Route::post('/dashboard/transaksi/bayar',[TransaksiController::class,'bayar'])->name('transaksi.bayar');
        Route::get('/cities/{province_id}', [CheckOngkirController::class,'getCities']);
        
        Route::resource('/dashboard/cart', CartController::class);
    });
});
