<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'application-request')->name('welcome');
// Route::view('/application-request', 'application-request')->name('application-request');
// Route::view('/certificate-request', 'certificate-request')->name('certificate-request');
// Route::view('/payment-request', 'payment-request')->name('payment-request');