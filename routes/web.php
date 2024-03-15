<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardC;
use App\Http\Controllers\ProductsC;
use App\Http\Controllers\TransactionsC;
use App\Http\Controllers\UsersC;
use App\Http\Controllers\LaporanC;
use App\Http\Controllers\LogC;
use App\Http\Controllers\LoginC;

Route::resource('dashboard', DashboardC::class)->middleware('auth');

Route::get('log', [LogC::class, 'index'])->name('log.index')->middleware('auth');
// Route::get('/log/filter1', [LogC::class, 'filter1'])->name('log.filter1');
Route::get('/log/filter', [LogC::class, 'filter1'])->name('log.filter');


Route::get('laporan', [LaporanC::class, 'index'])->name('laporan.index');
Route::get('/laporan/filter', [LaporanC::class, 'filter'])->name('laporan.filter');
Route::get('/laporan/export', [LaporanC::class, 'export'])->name('laporan.export');

Route::get('products/pdf', [ProductsC::class, 'pdf'])->middleware('UserAkses:owner');
Route::resource('products', ProductsC::class)->middleware('UserAkses:admin,kasir,owner');
Route::get('users/pdf', [UsersC::class, 'pdf'])->middleware('UserAkses:admin');
Route::resource('users', UsersC::class)->middleware('UserAkses:owner,admin');
Route::get('users/create', [UsersC::class, 'create'])->name('users.create')->middleware('UserAkses:admin');

Route::get('transactions/pdf2/{id}', [TransactionsC::class, 'pdf2'])->name('transactions.pdf2')->middleware('UserAkses:kasir');
Route::get('transactions/pdf', [TransactionsC::class, 'pdf'])->middleware('UserAkses:owner,kasir,admin');
Route::get('laporan1', [TransactionsC::class, 'laporan1'])->name('laporan1')->middleware('UserAkses:owner, kasir');
Route::get('laporanTransaksi/{start_date}/{end_date}', [TransactionsC::class, 'laporanTransaksi'])->name('laporanTransaksi')->middleware('UserAkses:owner, kasir');
Route::get('transactions', [TransactionsC::class, 'index'])->name('transactions.index')->middleware('UserAkses:kasir,owner,admin');
Route::get('transactions/create', [TransactionsC::class, 'create'])->name('transactions.create')->middleware('UserAkses:kasir');
Route::post('transactions/store', [TransactionsC::class, 'store'])->name('transactions.store')->middleware('UserAkses:kasir,owner,admin');
Route::get('transactions/edit/{id}', [TransactionsC::class, 'edit'])->name('transactions.edit')->middleware('UserAkses:admin');
Route::put('transactions/update/{id}', [TransactionsC::class, 'update'])->name('transactions.update')->middleware('UserAkses:admin');
Route::delete('transactions/delete/{id}', [TransactionsC::class, 'delete'])->name('transactions.delete')->middleware('UserAkses:admin');

Route::get('users/changepassword/{id}', [UsersC::class, 'changepassword'])->name('users.changepassword')->middleware('UserAkses:admin');
Route::put('users/change/{id}', [UsersC::class, 'change'])->name('users.change')->middleware('UserAkses:admin');

Route::get('login', [loginC::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [loginC::class, 'login_action'])->name('login.action')->middleware('guest');
Route::get('logout', [loginC::class, 'logout'])->name('logout')->middleware('auth');
