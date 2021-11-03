<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyAppController;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FileController;

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

Route::get('/',[SignatureController::class, 'welcome']);

Route::get('/signature',[SignatureController::class, 'signature'])->middleware('auth');

Route::get('/getSignatures', [SignatureController::class, 'getSignatures'])->middleware('auth');

Route::get('/detailSignature/{id}', [SignatureController::class, 'detailSignature'])->name('details')->middleware('auth');

Route::post('/postSignature', [SignatureController::class, 'postSignature'])->middleware('auth');

Route::delete('/destroySignature/{id}', [SignatureController::class, 'destroySignature']);

Route::post('/upload', [FileController::class, 'upload'])->name('upload');

Route::post('/store-multiple-image', [SignatureController::class, 'store']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
