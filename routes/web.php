<?php

namespace App\Http\Controllers;

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

Route::get('/', User\WelcomeController::class);

Route::get('/root', function () {
    return view('root.index');
});

Route::get('/redirect', function () {
    if (auth()->user()->level == "user") {
        return redirect('/user/dashboard');
    } else {
        return redirect('/reviewer/dashboard');
    }
});

//route for admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', Admin\DashboardController::class);

    //route for submissions
    Route::get('/submissions', [Admin\SubmissionController::class, 'index']);

    //route for users
    Route::get('/users', [Admin\UserController::class, 'index']);

    Route::get('/profile', Admin\ProfileController::class);
});

//route viewer
Route::middleware(['auth', 'reviewer'])->prefix('reviewer')->group(function () {
    Route::get('/dashboard', [Reviewer\DashboardController::class, 'index']);

    Route::get('/submission', [Reviewer\SubmissionController::class, 'index']);
    Route::get('/submission/show/{id}', [Reviewer\SubmissionController::class, 'show']);
    Route::get('/submission/edit/{id}', [Reviewer\SubmissionController::class, 'edit']);
    Route::get('/submission/review/{id}', [Reviewer\SubmissionController::class, 'review']);
    Route::put('/submission/update/{id}', [Reviewer\SubmissionController::class, 'update']);

    Route::get('submission/revised', [Reviewer\SubmissionController::class, 'revised']);
    Route::get('submission/accepted', [Reviewer\SubmissionController::class, 'accepted']);
    Route::get('submission/rejected', [Reviewer\SubmissionController::class, 'rejected']);

    //route for profile
    Route::get('/profile', Reviewer\ProfileController::class);
});

//route for admin
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [Admin\DashboardController::class, 'index']);

    Route::post('/scan', Admin\SacanQrcdeController::class);
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
    Route::post('/submission/update/{id}', [User\SubmisionController::class, 'update']);

    Route::put('/persentation/{id}', [User\PersentationController::class, 'update']);

    //route for loa
    Route::get('/loa', [User\LoaController::class, 'index']);
    Route::get('/loa_download/{id}', [User\LoaController::class, 'download']);

    //route for profile
    Route::get('/profile', [User\ProfileController::class, 'index']);

    //route for download template
    Route::get('/download/template', User\TemplateController::class);

    //route scan qr
    Route::get('scan-qr', [User\QrcodeController::class, 'index']);
    Route::get('/qr_code/validation', [User\QrcodeController::class, 'validation']);

    //download sertifikat
    Route::get('/download-sertifikat', User\SertifikatController::class);
});
