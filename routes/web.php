<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customerController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\scanBarcodeController;
use App\Http\Controllers\tokoController;
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
    $data = "";
    return view('home',compact('data'));
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
Route::post('/barang/cetakpdf/', [barangController::class, 'cetakPdf'] );

//scan barcode
Route::get('/barcode-scanner', [scanBarcodeController::class, 'index']);
Route::get('/scan-kunjungan-toko',[scanBarcodeController::class,'scanKunjungan']);
Route::post('/scan-kunjungan-toko/getLocationToko',[scanBarcodeController::class,'getLocationToko']);
Route::post('/scan-kunjungan-toko/hasil',[scanBarcodeController::class,'getDistanceFromLatLonInKm']);

//kujungan toko
Route::get('/kunjungan-toko',[tokoController::class,'index']);
Route::post('/kunjungan-toko/create', [tokoController::class, 'store'] );
Route::get('/kunjungan-toko/export/{id}', [tokoController::class, 'export'] );
