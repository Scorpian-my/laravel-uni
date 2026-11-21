<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('shop');
});

Route::get('/docs', function () {
    return view('home');
});
