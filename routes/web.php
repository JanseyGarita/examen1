<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'routes_controller@get_profile')->name('profile');
Route::get('/community', 'routes_controller@get_profiles');
Route::get('/watch', 'routes_controller@get_videos');

Route::post('/profile', 'profile_controller@update')->name('update');

Route::post('/profile/{id?}', 'profile_controller@get_view_profile')->name('view_profile');

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', 'profile_controller@login')->name('login');

Route::get('/exit', 'profile_controller@logout');
