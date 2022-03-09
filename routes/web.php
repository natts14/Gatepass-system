<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin-homepage', function () {
    return view('admin-homepage');
});

Route::get('/admin-profile', function () {
    return view('admin-profile');
});

Route::get('/admin-events', function () {
    return view('admin-events');
});

Route::get('/admin-events-add', function () {
    return view('admin-events-add');
});

Route::get('/admin-events-update', function () {
    return view('admin-events-update');
});

Route::get('/admin-parking-space', function () {
    return view('admin-parking-space');
});

Route::get('/admin-request', function () {
    return view('admin-request');
});

Route::get('/admin-request-renewal', function () {
    return view('admin-request-renewal');
});

Route::get('/admin-request-event', function () {
    return view('admin-request-event');
});

Route::get('/admin-request-license', function () {
    return view('admin-request-license');
});

Route::get('/admin-userpage', function () {
    return view('admin-userpage');
});

Route::get('/admin-add-user', function () {
    return view('admin-userpage-addUser');
});


