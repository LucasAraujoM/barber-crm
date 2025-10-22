<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/logout', function () {
    if (auth()->check()) {
        auth()->logout();
    }
    return redirect()->route('home');
});

Route::post('/contact', function () {
    return redirect()->route('home');
})->name('contact');
