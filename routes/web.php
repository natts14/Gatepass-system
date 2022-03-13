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
    return view('admin/dashboard/homepage');
});

Route::get('/admin-profile', function () {
    return view('admin/profile/profile');
});

Route::get('/admin-events', function () {
    return view('admin/events/events');
});

Route::get('/admin-events-add', function () {
    return view('admin/events/add');
});

Route::get('/admin-events-update', function () {
    return view('admin/events/update');
});

Route::get('/admin-parking-space', function () {
    return view('admin/parking/parking_space');
});

Route::get('/admin-parking-space-add', function () {
    return view('admin/parking/add');
});

Route::get('/admin-parking-space-update', function () {
    return view('admin/parking/update');
});

Route::get('/admin-request', function () {
    return view('admin/request/request');
});

Route::get('/admin-request-renewal', function () {
    return view('admin/request/renewal');
});

Route::get('/admin-request-event', function () {
    return view('admin/request/event');
});

Route::get('/admin-request-license', function () {
    return view('admin/request/license');
});

Route::get('/admin-userpage', function () {
    return view('admin/user/userpage');
});

Route::get('/admin-add-user', function () {
    return view('admin/user/add_user');
});

Route::get('/admin-userpage-records', function () {
    return view('admin/user/records');
});

Route::get('/admin-user-record-info-update', function () {
    return view('admin/user/info_update');
});

Route::get('/admin-user-record-license-update', function () {
    return view('admin/user/license_update');
});

Route::get('/admin-user-record-vehicle-update', function () {
    return view('admin/user/vehicle_update');
});

Route::get('/guard-homepage', function () {
    return view('guard/homepage');
});

Route::get('/guard-profile', function () {
    return view('guard/profile');
});
