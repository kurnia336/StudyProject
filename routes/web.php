<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customerController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\scanBarcodeController;
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

Route::get('/', function () {
    return view('home');
});
//customer
Route::get('/customer', [customerController::class, 'index'] );
Route::get('/customer-tambah1', [customerController::class, 'create'] );
Route::post('/customer-tambah1/store', [customerController::class, 'store'] );
Route::post('/customer_tambah1/cities', [customerController::class, 'fetchCity'] );
Route::post('/customer_tambah1/districs', [customerController::class, 'fetchDistrics'] );
Route::post('/customer_tambah1/subdistrics', [customerController::class, 'fetchSubDistrics'] );
Route::get('/customer-tambah2', [customerController::class, 'create2'] );
Route::post('/customer-tambah2/store', [customerController::class, 'store2'] );

//barang
Route::get('/barang', [barangController::class, 'index'] );
Route::post('/barang/create', [barangController::class, 'store'] );
Route::get('/barang/cetakpdf/', [barangController::class, 'cetakPdf'] );

//scan barcode
Route::get('/barcode-scanner', [scanBarcodeController::class, 'index']);

