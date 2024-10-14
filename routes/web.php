<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Hometemplate.home');
});

Route::get('/login', function () {
    return view('Hometemplate.login');
});
