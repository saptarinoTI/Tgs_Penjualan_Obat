<?php

use App\Http\Controllers;
use App\Models\Obat;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => to_route('login'));

Route::middleware(['guest'])->group(function () {
    Route::get('login', [Controllers\AuthController::class, 'login'])->name('login');
    Route::post('login', [Controllers\AuthController::class, 'check'])->name('login.check');
    Route::get('register', [Controllers\AuthController::class, 'register'])->name('register');
    Route::post('register', [Controllers\AuthController::class, 'store'])->name('register.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        $pembeli = User::where('is_admin', "0")->get();
        $obat = Obat::get();
        if (auth()->user()->is_admin == 1) {
            $transaksi = Transaksi::get();
        } else {
            $transaksi = Transaksi::where('user_id', auth()->user()->id)->get();
        }
        return view('app.dashboard', compact('pembeli', 'obat', 'transaksi'));
    })->name('dashboard');

    /* Data Pembeli */
    Route::get('pembeli', [Controllers\PembeliController::class, 'index'])->name('pembeli.index')->middleware('authCheck');
    Route::delete('pembeli/{id}', [Controllers\PembeliController::class, 'destroy'])->name('pembeli.destroy')->middleware('authCheck');

    /* Data Obat */
    Route::post('iobat', Controllers\IObatController::class)->name('obat.pembelian');
    Route::get('obat', [Controllers\ObatController::class, 'index'])->name('obat.index');
    Route::get('obat/create', [Controllers\ObatController::class, 'create'])->name('obat.create')->middleware('authCheck');
    Route::post('obat', [Controllers\ObatController::class, 'store'])->name('obat.store')->middleware('authCheck');
    Route::get('obat/{id}', [Controllers\ObatController::class, 'show'])->name('obat.show');
    Route::get('obat/{id}/edit', [Controllers\ObatController::class, 'edit'])->name('obat.edit')->middleware('authCheck');
    Route::put('obat/{id}', [Controllers\ObatController::class, 'update'])->name('obat.update')->middleware('authCheck');
    Route::delete('obat/{id}', [Controllers\ObatController::class, 'destroy'])->name('obat.destroy')->middleware('authCheck');

    /* Keranjang Obat */
    Route::get('keranjang', [Controllers\KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('keranjang/create', [Controllers\KeranjangController::class, 'create'])->name('keranjang.create');
    Route::delete('keranjang/{id}', [Controllers\KeranjangController::class, 'destroy'])->name('keranjang.destroy');

    /* Pembelian Obat */
    Route::get('transaksi', [Controllers\TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('transaksi/{id}', [Controllers\TransaksiController::class, 'show'])->name('transaksi.show');
    Route::get('transaksi/{id}/confirm', [Controllers\TransaksiController::class, 'confirm'])->name('transaksi.confirm');
    Route::get('transaksi/{id}/finish', [Controllers\TransaksiController::class, 'finish'])->name('transaksi.finish');
    Route::get('transaksi/{id}/reject', [Controllers\TransaksiController::class, 'reject'])->name('transaksi.reject');

    /* Atur Ongkir */
    Route::get('ongkir', [Controllers\OngkirController::class, 'index'])->name('ongkir.index')->middleware('authCheck');
    Route::put('ongkir/{id}', [Controllers\OngkirController::class, 'update'])->name('ongkir.update')->middleware('authCheck');

    Route::get('logout', [Controllers\AuthController::class, 'logout'])->name('logout');
});
