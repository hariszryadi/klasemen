<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlubController;
use App\Http\Controllers\KlasemenController;
use App\Http\Controllers\PertandinganController;

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

Route::resource('klub', KlubController::class);
Route::resource('pertandingan', PertandinganController::class);
Route::resource('klasemen', KlasemenController::class);
