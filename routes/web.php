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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('backups', [App\Http\Controllers\BackupController::class, 'index'])->name('backup')->middleware('auth');
Route::get('/add-backup', [App\Http\Controllers\BackupController::class, 'create'])->middleware('auth');
Route::post('/store-backup', [App\Http\Controllers\BackupController::class, 'store'])->middleware('auth');
Route::get('/view-backup', [App\Http\Controllers\BackupController::class, 'Branch'])->middleware('auth');
