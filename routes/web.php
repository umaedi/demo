<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::get('/', User\WelcomeController::class);

//route for events
Route::get('/steering-committee', [EventController::class, 'index']);
Route::get('/about', [EventController::class, 'about']);
Route::get('/schedule', [EventController::class, 'schedule']);

//route for papers
Route::get('/call-for-papers', [PaperController::class, 'index']);

//route for proceding
Route::get('/proceeding', [ProceedingController::class, 'index']);
Route::get('/proceeding/show', [ProceedingController::class, 'show']);

Route::get('/proceeding/topic1', [ProceedingController::class, 'topic1']);
Route::get('/proceeding/topic1/show', [ProceedingController::class, 'paper']);
Route::get('/proceeding/topic2', [ProceedingController::class, 'topic2']);
Route::get('/proceeding/topic3', [ProceedingController::class, 'topic3']);

//route for icomesh
Route::get('/ecomesh', [IcomeshController::class, 'index']);

//route for galleri
Route::get('gallery', GaleriController::class);

Route::get('/root', function () {
    return view('root.index');
});

Route::get('/redirect', function () {
    if (auth()->user()->level == "user") {
        return redirect('/user/dashboard');
    } elseif (auth()->user()->level == "reviewer") {
        return redirect('/reviewer/dashboard');
    } elseif (auth()->user()->level == "admin") {
        return redirect('/admin/dashboard');
    }
});

//route for admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', Admin\DashboardController::class);

    //route for submissions
    Route::get('/submissions', [Admin\SubmissionController::class, 'index']);
    Route::get('/submissions/show/{id}', [Admin\SubmissionController::class, 'show']);
    Route::get('/submission/show/{id}', [Admin\SubmissionController::class, 'detail']);
    Route::get('/submission/edit/{id}', [Admin\SubmissionController::class, 'edit']);

    //route for zoom
    Route::post('/zoom/update', Admin\ZoomController::class);

    //route for reviewers
    Route::get('/reviewers', [Admin\ReviewerController::class, 'index']);
    Route::post('/create_new_reviewer', [Admin\ReviewerController::class, 'store']);
    Route::get('/reviewer/show/{id}', [Admin\ReviewerController::class, 'show']);

    //route for participants
    Route::get('/participants', [Admin\ParticipantController::class, 'index']);
    Route::get('/participant/show/{id}', [Admin\ParticipantController::class, 'show']);
    Route::post('/persence/user/{id}', [Admin\ParticipantController::class, 'persence']);

    Route::get('/profile', Admin\ProfileController::class);

    //route for download
    Route::get('/download/submission/{id}', [Admin\DownloadController::class, 'index']);
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
    Route::get('/submissions/delete/{id}', [User\SubmisionController::class, 'delete']);
    Route::get('/submissions/withdraw/{id}', [User\SubmisionController::class, 'withdraw']);

    Route::put('/persentation/ppt/{id}', [User\PersentationController::class, 'ppt']);
    Route::put('/persentation/paper/{id}', [User\PersentationController::class, 'paper']);

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
