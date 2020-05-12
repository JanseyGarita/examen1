<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('profile', ['search' => '', 'profile' => 'active', 'videos' => '']);
});
Route::get('/search', function () {
    return view('search', ['search' => 'active', 'profile' => '', 'videos' => '']);
});
