<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CartController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Pages
Route::get('/home', [App\Http\Controllers\PageController::class,'index'])->name('home');
Route::get('/home', [App\Http\Controllers\PageController::class,'menu'])->name('home');
Route::get('/category/{id}', [App\Http\Controllers\PageController::class,'getCategory']);
Route::get('/type/{id}', [App\Http\Controllers\PageController::class,'getType']);
Route::get('/product/{id}', [App\Http\Controllers\PageController::class,'getProduct']);
Route::post('/search', [App\Http\Controllers\SearchController::class,'getSearch']);
//Admin
Route::get('/admin', [App\Http\Controllers\AdminController::class,'index'])->name('admin');
Route::get('/login', [App\Http\Controllers\AdminController::class,'getLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\AdminController::class,'postLogin']);
Route::get('/logout', [App\Http\Controllers\AdminController::class,'getLogout']);

Route::group(['prefix'=>'/admin', 'middleware'=>'auth'],function(){
    Route::resource('category', CategoryController::class);
    Route::resource('type', TypeController::class);
    Route::resource('product', ProductController::class);
    Route::get('/logout', [App\Http\Controllers\AdminController::class,'getLogout']);
});

//Languages
Route::get('lang/{locale}', function($locale){
    session()->put('locale', $locale);
    return redirect()->back();
});

//Cart
Route::group(['prefix'=>'/giohang', 'middleware'=>'auth'],function(){
    Route::post('/add-cart', [App\Http\Controllers\CartController::class,'addCart']);
    Route::get('/', [App\Http\Controllers\CartController::class,'gioHang']);
    Route::get('/del-cart/{session_id}', [App\Http\Controllers\CartController::class,'delCart']);
    Route::post('/update-cart', [App\Http\Controllers\CartController::class,'updateCart']);
    Route::get('/del-all-cart', [App\Http\Controllers\CartController::class,'delAllCart']);
});
