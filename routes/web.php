<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

//route for admin
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

//route for user
Route::middleware(['auth', 'verified'])->prefix('user')->group(function () {
    Route::get('/dashboard', [User\DashboardController::class, 'index']);

    //route for submision
    Route::get('/submission', [User\SubmisionController::class, 'index']);
    Route::get('/submission/create', [User\SubmisionController::class, 'create']);
    Route::post('/submission/store', [User\SubmisionController::class, 'store']);
    Route::get('/submission/show/{id}', [User\SubmisionController::class, 'show']);
    Route::get('/submission/edit/{id}', [User\SubmisionController::class, 'edit']);

    //route for profile
    Route::get('/profile', [User\ProfileController::class, 'index']);

    //route scan qr
    Route::get('/scan-qr', User\ScanqrController::class);

    //download sertifikat
    Route::get('/download-sertifikat', User\SertifikatController::class);
});
