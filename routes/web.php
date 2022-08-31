<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Mail\order;
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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');
Route::get('/',[HomeController::class, 'index']);
//admin controller

Route::get('/view_category', [AdminController::class, 'view_category']);

Route::post('/add_category', [AdminController::class, 'add_category']);
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::get('/view_product', [AdminController::class, 'view_product']);
Route::post('/add_product', [AdminController::class, 'add_product']);
Route::get('/show_product', [AdminController::class, 'show_product']);
Route::get('/delete_product/{id}', [HomeController::class, 'delete_product']);
Route::get('/update_product/{id}', [HomeController::class, 'update_product']);

Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);
Route::get('/products_details/{id}', [HomeController::class, 'product_details']);
Route::post('/add_carts', [HomeController::class, 'add_cart']);
Route::get('/show_cart', [HomeController::class, 'show_cart']);

Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);
Route::get('/cash_order', [HomeController::class, 'cash_order']);
Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe']);

Route::post('stripe/{totalprice}',[HomeController::class,'stripePost'])->name('stripe.post');

Route::get('/order',[AdminController::class,'show_orders']);

Route::get('/delivered/{id}',[AdminController::class,'delivered']);




Route::get('/cancel_delivery/{id}',[AdminController::class,'exit']);


Route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);
Route::get('/send_email/{id}',[AdminController::class,'send_email']);
