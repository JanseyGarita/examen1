<?php

use Illuminate\Support\Facades\Route;

//(isset($_COOKIE['user'])? '':'routes_controller@get_login')

Route::get('/', (isset($_COOKIE['user']) ? 'routes_controller@get_profile' : 'routes_controller@get_login'))->name('profile');

Route::get('/community', (isset($_COOKIE['user']) ? 'routes_controller@get_profiles' : 'routes_controller@get_login'));

Route::get('/watch', (isset($_COOKIE['user']) ? 'routes_controller@get_videos' : 'routes_controller@get_login'));

Route::post('/profile', (isset($_COOKIE['user']) ? 'profile_controller@update' : 'routes_controller@get_login'))->name('update');

Route::post('/profile/{id?}', (isset($_COOKIE['user']) ? 'profile_controller@get_view_profile' : 'routes_controller@get_login'))->name('view_profile');

Route::get('/login', (!isset($_COOKIE['user']) ? 'routes_controller@get_login' : 'routes_controller@get_profile'));

Route::post('/login', (!isset($_COOKIE['user']) ? 'profile_controller@login' : 'routes_controller@get_login'))->name('login');

Route::get('/exit', (isset($_COOKIE['user']) ? 'profile_controller@logout' : 'routes_controller@get_login'));
