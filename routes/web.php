<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('certificate', CertificateController::class);
Route::get('certificate/view/{link}', [CertificateController::class, 'view'])
->name('certificate.view');