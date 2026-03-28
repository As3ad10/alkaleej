<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');
Route::view('/certificate-request', 'certificate-request')->name('certificate-request');
Route::view('/payment-request', 'payment-request')->name('payment-request');