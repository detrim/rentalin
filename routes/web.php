<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\TransaksiMobilController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\ui\UiController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/', [UiController::class, 'index'])->name('index');
route::get('/ui-mobil', [UiController::class, 'uimobil'])->name('ui-mobil');
route::get('/ui-mobil/{kode}{id}/detail', [UiController::class, 'show']);
// route::get('/ui-mobil/{kode}{id}/detail2', [UiController::class, 'show2']);
// route::post('/next-mobil/uinext', [UiController::class, 'uinext']);
route::patch('/next-mobil/uinext', [UiController::class, 'uinext']);
route::get('/nextmobil/{faktur}{id}/faktur', [UiController::class, 'next']);

route::patch('/two-mob/{faktur}{id}/cetak', [UiController::class, 'cetak']);
route::get('/nextbuktimob/{faktur}{id}/bukti', [UiController::class, 'bukti']);
route::get('/nextbuktimob/{faktur}{id}/bukti_print', [UiController::class, 'bukti_print']);






route::get('/login', [LoginController::class, 'login']);
route::get('/logout', [LoginController::class, 'logout'])->name('logout');
route::post('/proses-login', [LoginController::class, 'proseslogin'])->name('proseslogin');
Route::get('/beranda', function () {
    return view('beranda');
});
route::get('/ren-mobil', [RentalController::class, 'index'])->name('ren-mobil');
route::get('/ren-mobil/create', [RentalController::class, 'create'])->name('create');
route::post('/store-mobil', [RentalController::class, 'store'])->name('store-mobil');
route::get('/ren-mobil/{kode}{id}/detail', [RentalController::class, 'show']);
route::get('/ren-mobil/{kode}{id}/edit', [RentalController::class, 'edit']);
route::patch('/ren-mobil/{kode}{id}/editphotos', [RentalController::class, 'editphotos']);
route::patch('/ren-mobil/{kode}{id}/editmobil', [RentalController::class, 'editmobil']);



route::get('/transaksi-mobil', [TransaksiMobilController::class, 'index'])->name('transaksi-mobil');
route::get('/pdf-transaksi', [TransaksiMobilController::class, 'pdfexport'])->name('pdfexport');
route::get('/PDF/create', [TransaksiMobilController::class, 'pdf'])->name('pdf');

route::get('/metode-payment', [RekeningController::class, 'index'])->name('metode-payment');
route::get('/payment/create', [RekeningController::class, 'create']);
route::post('/metode-payment-post', [RekeningController::class, 'store'])->name('metode-payment-post');
