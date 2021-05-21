<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\laptopController;

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
    return view('welcome');
});

Route::get('/list-laptop', [laptopController::class, 'list']);

Route::get('/tambah-laptop', function () {
    return view('tambah-laptop');
});
Route::post('/simpan-laptop', [laptopController::class, 'simpan']);
Route::get('/hapus-laptop/{id}', [laptopController::class, 'hapus']);
Route::get('/ubah-laptop/{id}', [laptopController::class, 'ubah']);
Route::post('/ubah-laptop', [laptopController::class, 'rubah']);
