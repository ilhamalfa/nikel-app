<?php

use App\Http\Controllers\JadwalKendaraanController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;
use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    return redirect('login');
});

Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', function () {
        $jumlah = Laporan::all()
        ->groupBy(function($val) {
        return Carbon::parse($val->created_at)->format('m');
        })->pluck('jumlah');

        $bulan = Laporan::select(DB::raw("MONTHNAME(created_at) as bulan"))->groupBy(DB::raw("MONTHNAME(created_at)"))->pluck('bulan');
        
        // dd($jumlah);
        return view('dashboard', [
            'jumlah' => $jumlah,
            'bulan' => $bulan
        ]);
    });

    Route::get('persetujuan', [LaporanController::class, 'persetujuan']);

    Route::get('persetujuan/terima/{id}', [LaporanController::class, 'terima']);

    Route::get('persetujuan/tolak/{id}', [LaporanController::class, 'tolak']);

    Route::get('riwayat/user', [LaporanController::class, 'riwayat']);

    Route::get('profil/', [LaporanController::class, 'profil']);

    Route::post('profil/edit/{id}', [LaporanController::class, 'editProfil']);
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('kendaraan', KendaraanController::class)->except('destroy', 'show', 'edit', 'create');

    Route::get('kendaraan/delete/{id}', [KendaraanController::class, 'delete']);

    Route::resource('user', UserController::class)->except('destroy', 'show', 'edit', 'create');

    Route::get('user/delete/{id}', [UserController::class, 'delete']);

    Route::get('peminjaman', [LaporanController::class, 'index']);

    Route::post('peminjaman/proses', [LaporanController::class, 'peminjaman']);

    Route::get('pengembalian', [LaporanController::class, 'pengembalian']);

    Route::get('dikembalikan/{id}', [LaporanController::class, 'kembalikan']);

    Route::resource('kendaraan/jadwal', JadwalKendaraanController::class)->except('index', 'show', 'destroy', 'edit', 'create', 'update');

    Route::get('kendaraan/jadwal-service/{id}', [JadwalKendaraanController::class, 'jadwal']);

    Route::get('kendaraan/konfirm-service/{id}', [JadwalKendaraanController::class, 'konfirmasi']);

    Route::get('export/laporan', [LaporanController::class, 'exportLaporan']);
});