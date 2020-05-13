<?php

use Illuminate\Support\Facades\Route;

Route::get('/','routes_controller@get_profile');
Route::get('/community','routes_controller@get_profiles');
Route::get('/watch','routes_controller@get_videos');



Route::get('/prueba','routes_controller@get_prueba');
Route::get('/detalle/{id?}','routes_controller@get_detalle')->name('detalle');

Route::post('detalle', 'profile_controller@update')->name('update');

Route::get('/login',function(){ return view('login');});
