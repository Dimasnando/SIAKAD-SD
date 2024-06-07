<?php

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

Route::get('/', function () {
    $info = \App\Models\Informasis::get();
    // $profil = \App\Models\Profil::get();
    return view('welcome', compact('info'));
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth', 'HakRole:Dev']], function () {
    Route::group(['prefix' => 'pegawai'], function () {
        Route::get('/', [App\Http\Controllers\PegawaiController::class, 'index']);
        Route::post('/store', [App\Http\Controllers\PegawaiController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\PegawaiController::class, 'edit']);
        Route::post('/update/{id}/', [App\Http\Controllers\PegawaiController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\PegawaiController::class, 'delete']);
    });
    Route::group(['prefix' => 'siswa'], function () {
        Route::get('/', [App\Http\Controllers\SiswaController::class, 'index']);
        Route::post('/store', [App\Http\Controllers\SiswaController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\SiswaController::class, 'edit']);
        Route::post('/update/{id}/', [App\Http\Controllers\SiswaController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\SiswaController::class, 'delete']);
    });
    Route::group(['prefix' => 'mapel'], function () {
        Route::get('/', [App\Http\Controllers\MapelController::class, 'index']);
        Route::post('/store', [App\Http\Controllers\MapelController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\MapelController::class, 'edit']);
        Route::post('/update/{id}/', [App\Http\Controllers\MapelController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\MapelController::class, 'delete']);
    });
    Route::group(['prefix' => 'tahun'], function () {
        Route::get('/', [App\Http\Controllers\TahunController::class, 'index']);
        Route::post('/store', [App\Http\Controllers\TahunController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\TahunController::class, 'edit']);
        Route::post('/update/{id}/', [App\Http\Controllers\TahunController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\TahunController::class, 'delete']);
    });
    Route::group(['prefix' => 'informasi'], function () {
        Route::get('/', [App\Http\Controllers\InformasiController::class, 'index']);
        Route::post('/store', [App\Http\Controllers\InformasiController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\InformasiController::class, 'edit']);
        Route::post('/update/{id}/', [App\Http\Controllers\InformasiController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\InformasiController::class, 'delete']);
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/guru', [App\Http\Controllers\UserController::class, 'guru']);
        Route::get('/siswa', [App\Http\Controllers\UserController::class, 'siswa']);
        Route::post('/store/guru', [App\Http\Controllers\UserController::class, 'store_guru']);
        Route::post('/store/siswa', [App\Http\Controllers\UserController::class, 'store_siswa']);
        Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
        Route::post('/update/{id}/', [App\Http\Controllers\UserController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\UserController::class, 'delete']);
    });
    Route::group(['prefix' => 'laporans'], function () {
        Route::get('/', [App\Http\Controllers\LaporanController::class, 'index']);
        Route::get('/nilai/{siswa_id}/{tahun_id}/', [App\Http\Controllers\LaporanController::class, 'laporan']);
    });
});
// akademik
Route::group(['middleware' => ['auth', 'HakRole:Guru,Dev,Siswa']], function () {
    Route::group(['prefix' => 'jadwal'], function () {
        Route::get('/', [App\Http\Controllers\JadwalController::class, 'index']);
        Route::get('/detail/{id}', [App\Http\Controllers\JadwalController::class, 'detail']);
        Route::get('/delete/siswa/{id}', [App\Http\Controllers\JadwalController::class, 'delete_siswa']);
        Route::get('/detail/ngajar/{id}', [App\Http\Controllers\JadwalController::class, 'detail_ngajar']);
        Route::post('/store', [App\Http\Controllers\JadwalController::class, 'store']);
        Route::post('/store/siswa', [App\Http\Controllers\JadwalController::class, 'store_siswa']);
        Route::get('/edit/{id}', [App\Http\Controllers\JadwalController::class, 'edit']);
        Route::post('/update/{id}/', [App\Http\Controllers\JadwalController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\JadwalController::class, 'delete']);
    });
    Route::group(['prefix' => 'kelas'], function () {
        Route::get('/', [App\Http\Controllers\KelasController::class, 'index']);
        Route::post('/store', [App\Http\Controllers\KelasController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\KelasController::class, 'edit']);
        Route::post('/update/{id}/', [App\Http\Controllers\KelasController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\KelasController::class, 'delete']);
    });
    Route::group(['prefix' => 'nilai'], function () {
        Route::get('/', [App\Http\Controllers\NilaiController::class, 'tahun']);
        Route::get('/saya', [App\Http\Controllers\NilaiController::class, 'siswa']);
        Route::get('/tahun/{id}', [App\Http\Controllers\NilaiController::class, 'index']);
        Route::get('/all/siswa/{id}', [App\Http\Controllers\NilaiController::class, 'detail']);
        Route::get('/siswa/{id}', [App\Http\Controllers\NilaiController::class, 'nilai']);
        Route::post('/store', [App\Http\Controllers\NilaiController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\NilaiController::class, 'edit']);
        Route::post('/update/{id}/', [App\Http\Controllers\NilaiController::class, 'update']);
        Route::get('/delete/{id}', [App\Http\Controllers\NilaiController::class, 'delete']);
    });
    Route::group(['prefix' => 'profil'], function () {
        Route::get('/{id}', [App\Http\Controllers\UserController::class, 'profil_edit']);
        Route::post('/{id}/update', [App\Http\Controllers\UserController::class, 'profil_update']);
    });
    Route::group(['prefix' => 'siswa-saya'], function () {
        Route::get('/', [App\Http\Controllers\SiswaController::class, 'tahun']);
        Route::get('/tahun/{id}', [App\Http\Controllers\SiswaController::class, 'siswa_saya']);
        Route::get('/{id}', [App\Http\Controllers\SiswaController::class, 'siswa_saya_detail']);
        Route::get('/nilai/{id}', [App\Http\Controllers\SiswaController::class, 'siswa_saya_nilai']);
    });
});
