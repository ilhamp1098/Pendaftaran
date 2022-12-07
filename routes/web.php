<?php


use App\Models\User;
use App\Models\Wilayah;
use App\Models\Pegawai;
use App\Models\Pasien;
use App\Models\Obat;
use App\Models\Pendaftaran;
use App\Models\Tindakan;
use App\Models\Tagihan;
use Illuminate\Routing\Router;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('dashboard/register', [RegisterController::class, 'index'])->middleware('auth');
Route::get('dashboard/register/create', [RegisterController::class, 'create'])->middleware('auth');
Route::post('dashboard/register', [RegisterController::class, 'store']);

Route::get('/', function () {
    return view('login.index');
})->name('login')->middleware('guest');;

Route::get('/dashboard', function()
{
	return view('dashboard.index');
})->middleware('auth');

Route::resource('dashboard/wilayah', WilayahController::class)->except('show')->middleware('auth');

// Route::resource('dashboard/pegawai', PegawaiController::class)->middleware('auth');

Route::resource('dashboard/pasien', PasienController::class)->middleware('auth');

Route::resource('dashboard/obat', ObatController::class)->middleware('auth');

Route::resource('dashboard/pendaftaran', PendaftaranController::class)->middleware('auth');

Route::resource('dashboard/tindakan', TindakanController::class)->middleware('auth');

Route::resource('dashboard/tagihan', TagihanController::class)->middleware('auth');

Route::get('/dashboard/pegawai', [PegawaiController::class, 'index'])->middleware('auth');
Route::get('/dashboard/pegawai/create', [PegawaiController::class, 'create'])->middleware('auth');
Route::post('/dashboard/pegawai', [PegawaiController::class, 'store'])->middleware('auth');
Route::get('/dashboard/pegawai/{id}', [PegawaiController::class, 'show'])->middleware('auth');
Route::get('/dashboard/pegawai/{id}/edit', [PegawaiController::class, 'edit'])->middleware('auth');
Route::post('/dashboard/pegawai/{id}', [PegawaiController::class, 'update'])->middleware('auth');
Route::post('/dashboard/pegawai-delete/{id}', [PegawaiController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard/grafik', [PegawaiController::class, 'grafik'])->middleware('auth');

