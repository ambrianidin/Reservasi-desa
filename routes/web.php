<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\ConfirmReservController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\HomestayController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\KategoriWisataController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\LoginPelangganController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsMController;
use App\Http\Controllers\ObyekWisataController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\RegistPelangganController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserMController;
use App\Models\Pelanggan;
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


/* ========================== PELANGGAN ==========================*/
Route::resource('/', App\Http\Controllers\HomeController::class);
Route::resource('/about', App\Http\Controllers\AboutController::class);
Route::resource('/news', App\Http\Controllers\NewsController::class);
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::resource('/contact', App\Http\Controllers\ContactController::class);
Route::resource('/wisata', App\Http\Controllers\WisataController::class);
Route::resource('/voucher', App\Http\Controllers\VoucherController::class);

Route::get('/reservasi/{id_paket}', [ReservationController::class, 'create'])->name('reservasi.create')->middleware('auth:web');
Route::post('/reservasi', [ReservationController::class, 'store'])->name('reservasi.store')->middleware('auth:web');
Route::post('/history-reservasi', [ReservationController::class, 'history'])->name('history-reservasi');
Route::get('/history-reservasi', [ReservationController::class, 'history'])->name('history-reservasi');
Route::get('/reservasi/{id}/nota', [\App\Http\Controllers\ReservationController::class, 'cetakNota'])->name('reservasi.nota');
Route::get('/login', function () {
    return redirect('/login-pelanggan');
})->name('login');
Route::get('/register-pelanggan', [RegistPelangganController::class, 'index']);
Route::post('/register-pelanggan', [RegistPelangganController::class, 'register'])->name('register-pelanggan');
Route::get('/login-pelanggan', [LoginPelangganController::class, 'index']);
Route::post('/login-pelanggan', [LoginPelangganController::class, 'login'])->name('login-pelanggan');
Route::post('/logoutP', [LoginPelangganController::class, 'logout'])->name('logoutP');



/* ========================== KARYAWAN ==========================*/

Route::get('/login-karyawan', [LoginAdminController::class, 'index'])->name('login-karyawan');
Route::post('/login-karyawan', [LoginAdminController::class, 'login'])->name('login-karyawan');
Route::get('/logoutK', [LoginAdminController::class, 'logout'])->name('logoutK');

/* ===================== admin =================================*/

Route::group(['middleware' => ['auth']], function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('karyawan:admin');

    Route::get('/newsM', [NewsMController::class, 'index'])->name('newsM')->middleware('karyawan:admin');
    Route::get('/newsM/create', [NewsMController::class, 'create'])->name('newsM.create')->middleware('karyawan:admin');
    Route::post('/newsM', [NewsMController::class, 'store'])->name('newsM.store')->middleware('karyawan:admin');
    Route::get('/newsM/{id}/edit', [NewsMController::class, 'edit'])->name('newsM.edit')->middleware('karyawan:admin');
    Route::put('/newsM/{id}', [NewsMController::class, 'update'])->name('newsM.update')->middleware('karyawan:admin');
    Route::delete('/newsM/{id}', [NewsMController::class, 'destroy'])->name('newsM.destroy')->middleware('karyawan:admin');
    Route::post('/kategoriNews', [KategoriBeritaController::class, 'store'])->name('kategori.store')->middleware('karyawan:admin');

    Route::get('/userM', [UserMController::class, 'index'])->name('userM')->middleware('karyawan:admin');
    Route::get('/userM/create', [UserMController::class, 'create'])->name('userM.create')->middleware('karyawan:admin');
    Route::post('/userM', [UserMController::class, 'store'])->name('userM.store')->middleware('karyawan:admin');
    Route::get('/userM/{id}/edit', [UserMController::class, 'edit'])->name('userM.edit')->middleware('karyawan:admin');
    Route::put('/userM/{id}', [UserMController::class, 'update'])->name('userM.update')->middleware('karyawan:admin');
    Route::put('/userM/{id}/ban', [UserMController::class, 'ban'])->name('userM.ban')->middleware('karyawan:admin');
    Route::put('/userM/{id}/unban', [UserMController::class, 'unban'])->name('userM.unban')->middleware('karyawan:admin');

    Route::get('/obyek-wisata', [ObyekWisataController::class, 'index'])->name('obyek-wisata')->middleware('karyawan:admin');
    Route::get('/obyek-wisata/create', [ObyekWisataController::class, 'create'])->name('obyek-wisata.create')->middleware('karyawan:admin');
    Route::post('/obyek-wisata', [ObyekWisataController::class, 'store'])->name('obyek-wisata.store')->middleware('karyawan:admin');
    Route::get('/obyek-wisata/{id}/edit', [ObyekWisataController::class, 'edit'])->name('obyek-wisata.edit')->middleware('karyawan:admin');
    Route::put('/obyek-wisata/{id}', [ObyekWisataController::class, 'update'])->name('obyek-wisata.update')->middleware('karyawan:admin');
    Route::delete('/obyek-wisata/{id}', [ObyekWisataController::class, 'destroy'])->name('obyek-wisata.destroy')->middleware('karyawan:admin');
    Route::post('/kategoriWisata', [KategoriWisataController::class, 'store'])->name('kategoriWisata.store')->middleware('karyawan:admin');

    Route::get('/homestay', [HomestayController::class, 'index'])->name('homestay')->middleware('karyawan:admin');
    Route::get('/homestay/create', [HomestayController::class, 'create'])->name('homestay.create')->middleware('karyawan:admin');
    Route::post('/homestay', [HomestayController::class, 'store'])->name('homestay.store')->middleware('karyawan:admin');
    Route::get('/homestay/{id}/edit', [HomestayController::class, 'edit'])->name('homestay.edit')->middleware('karyawan:admin');
    Route::put('/homestay/{id}', [HomestayController::class, 'update'])->name('homestay.update')->middleware('karyawan:admin');
    Route::delete('/homestay/{id}', [HomestayController::class, 'destroy'])->name('homestay.destroy')->middleware('karyawan:admin');

    Route::get('/paketwisata', [PaketWisataController::class, 'index'])->name('paketWisata')->middleware('karyawan:admin');
    Route::get('/paketwisata/create', [PaketWisataController::class, 'create'])->name('paketWisata.create')->middleware('karyawan:admin');
    Route::post('/paketwisata', [PaketWisataController::class, 'store'])->name('paketWisata.store')->middleware('karyawan:admin');
    Route::get('/paketwisata/{id}/edit', [PaketWisataController::class, 'edit'])->name('paketWisata.edit')->middleware('karyawan:admin');
    Route::put('/paketwisata/{id}', [PaketWisataController::class, 'update'])->name('paketWisata.update')->middleware('karyawan:admin');
    Route::delete('/paketwisata/{id}', [PaketWisataController::class, 'destroy'])->name('paketWisata.destroy')->middleware('karyawan:admin');

    //=========================== bendahara =======================================================//
    Route::get('/bendahara', [BendaharaController::class, 'index'])->name('bendahara')->middleware('karyawan:bendahara');

    Route::get('/diskon', [DiskonController::class, 'index'])->name('diskonM')->middleware('karyawan:bendahara');
    Route::get('/diskon/create', [DiskonController::class, 'create'])->name('diskonM.create')->middleware('karyawan:bendahara');
    Route::post('/diskon', [DiskonController::class, 'store'])->name('diskonM.store')->middleware('karyawan:bendahara');
    Route::get('/diskon/{id}/edit', [DiskonController::class, 'edit'])->name('diskonM.edit')->middleware('karyawan:bendahara');
    Route::put('/diskon/{id}', [DiskonController::class, 'update'])->name('diskonM.update')->middleware('karyawan:bendahara');
    Route::delete('/diskon/{id}', [DiskonController::class, 'destroy'])->name('diskonM.destroy')->middleware('karyawan:bendahara');
     Route::get('/reservation-confirm', [ConfirmReservController::class, 'index'])->name('confirmreserv')->middleware('karyawan:bendahara');
    Route::post('/update-status', [ConfirmReservController::class, 'updateStatus'])->name('updateStatus')->middleware('karyawan:bendahara');

    // Route::get(('/reservasi'), [ReservationController::class, 'index'])->name('reservasi')->middleware('karyawan:bendahara');
    // Route::get('/reservasi/create', [ReservationController::class, 'create'])->name('create')->middleware('karyawan:bendahara');
    // Route::post('/reservasi', [ReservationController::class, 'store'])->name('reservasi.store')->middleware('karyawan:bendahara');
    // Route::get('/reservasi/{id}/edit', [ReservationController::class, 'edit'])->name('reservasi.edit')->middleware('karyawan:bendahara');
    // Route::put('/reservasi/{id}', [ReservationController::class, 'update'])->name('reservasi.update')->middleware('karyawan:bendahara');
    // Route::delete('/reservasi/{id}', [ReservationController::class, 'destroy'])->name('reservasi.destroy')->middleware('karyawan:bendahara');

    //=========================== pemilik =======================================================//
    Route::get('/pemilik', [OwnerController::class, 'index'])->name('pemilik')->middleware('karyawan:pemilik');
    Route::get('/pemilik/laporan-reservasi', [OwnerController::class, 'exportPDF'])->name('pemilik.export.pdf')->middleware('karyawan:pemilik');
    
});
