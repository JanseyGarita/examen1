<?php

use Illuminate\Support\Facades\Route;

//(isset($_COOKIE['user'])? '':'routes_controller@get_login')

Route::get('/', (isset($_COOKIE['user']) ? 'routes_controller@get_profile' : 'routes_controller@get_login'))->name('profile');

Route::get('/community', (isset($_COOKIE['user']) ? 'routes_controller@get_profiles' : 'routes_controller@get_login'));
Route::post('/search', (isset($_COOKIE['user']) ? 'profile_controller@search_profiles' : 'routes_controller@get_login'))->name('search_profiles');

Route::get('/watch', (isset($_COOKIE['user']) ? 'routes_controller@get_videos' : 'routes_controller@get_login'));
Route::post('/videos', (isset($_COOKIE['user']) ? 'profile_controller@insert_video' : 'routes_controller@get_login'))->name('insert_video');
//user/{id}/view
Route::get('/user/{id}/view','routes_controller@user_view');

Route::get('/delete_video/{id}/delete','profile_controller@delete_video');

Route::post('/profile', (isset($_COOKIE['user']) ? 'profile_controller@update' : 'routes_controller@get_login'))->name('update');
Route::post('/profile/{id?}', (isset($_COOKIE['user']) ? 'profile_controller@get_view_profile' : 'routes_controller@get_login'))->name('view_profile');
Route::post('/insert_profile', (isset($_COOKIE['user']) ? 'routes_controller@get_login' : 'profile_controller@insert_profile'))->name('insert_profile');

Route::get('/login', (!isset($_COOKIE['user']) ? 'routes_controller@get_login' : 'routes_controller@get_profile'));
Route::post('/login', (!isset($_COOKIE['user']) ? 'profile_controller@login' : 'routes_controller@get_profile'))->name('login');

Route::get('/exit', (isset($_COOKIE['user']) ? 'profile_controller@logout' : 'routes_controller@get_login'));
