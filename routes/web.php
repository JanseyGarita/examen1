<?php

use Illuminate\Support\Facades\Route;

Route::get('/' . $_COOKIE["user"], 'routes_controller@get_profile')->name('profile');
Route::get('/community', 'routes_controller@get_profiles');
Route::get('/watch', 'routes_controller@get_videos');



Route::get('/prueba', 'routes_controller@get_prueba');
Route::get('/detalle/{id?}', 'routes_controller@get_detalle')->name('detalle');

Route::post('/detalle', 'profile_controller@update')->name('update');
Route::post('/videos2', 'profile_controller@insert_video')->name('insert_video');
Route::get('/videos2/{id?}', 'routes_controller@get_videos2')->name('videos');

Route::get('/login', function () {
    return view('login');
});

Route::get('/exit', 'profile_controller@logout');
