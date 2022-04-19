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

 
Route::group(['namespace'=> 'App\Http\Controllers'],function()
{  
    /**
    *  Register 
    */
    Route::get('/register','Auth\RegisterController@show')->name('register.show');
    Route::post('/register', 'Auth\RegisterController@register')->name('register.perform');

    /**
    * Login Routes
    */
    Route::get('/login', 'Auth\LoginController@show')->name('login.show');
    Route::post('/login', 'Auth\LoginController@login')->name('login.perform');
   

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'Auth\LogoutController@perform')->name('logout.perform');
        /**
         * Admin Homepage Dashboard
         */
        Route::get('/admin-homepage', 'Admin\Home\HomepageController@index')->name('admin.homepage');        

        /**
         * Admin Profile
         */
        Route::get('/admin-profile', 'Admin\Profile\ProfileController@index')->name('admin.profile');

        /**
         * Admin Events
         */
        Route::get('/admin-events', 'Admin\Events\EventsController@index')->name('admin.events');
        Route::get('/admin-events-add', 'Admin\Events\EventsController@create');
        Route::post('/admin-events', 'Admin\Events\EventsController@store');
        Route::get('/admin-events/{event}/edit', 'Admin\Events\EventsController@edit');
        Route::put('/admin-events/{event}', 'Admin\Events\EventsController@update');
        Route::get('/admin-events/{event}', 'Admin\Events\EventsController@destroy');
        Route::get('/admin-events-history', 'Admin\Events\EventsController@history');

        /**
         * Admin Parking Space
         */
        Route::get('/admin-parking-space', 'Admin\ParkingSpace\ParkingSpaceController@index')->name('admin.parking-space');
        Route::get('/admin-parking-space-add', 'Admin\ParkingSpace\ParkingSpaceController@create');
        Route::get('/admin-parking-space-update', 'Admin\ParkingSpace\ParkingSpaceController@edit');

         /**
         * Admin Request
         */
        Route::get('/admin-request', 'Admin\Request\RequestController@index')->name('admin.request');
        Route::get('/admin-request-event', 'Admin\Request\RequestController@event');
        Route::get('/admin-request-license', 'Admin\Request\RequestController@license');
        Route::get('/admin-request-renewal', 'Admin\Request\RequestController@renewal');


        Route::get('/admin-userpage', 'Admin\Users\UsersController@index')->name('admin.userpage');
        Route::get('/admin-user-add', 'Admin\Users\UsersController@create');
    });
});


/*

//Route::get('/admin-add-user', function () {
    //return view('admin/user-add_user');
//});

Route::get('/admin-homepage', function () {
    return view('admin-homepage');
});

Route::get('/admin-profile', function () {
    return view('admin/profile');
});

Route::get('/admin-p', function () {
    return view('admin/');
});

Route::get('/admin-events-add', function () {
    return view('admin/events/add');
});

Route::get('/admin-events-update', function () {
    return view('admin/events/update');
});

Route::get('/admin-parking-space', function () {
    return view('admin/parking_space');
});

Route::get('/admin-parking-space-add', function () {
    return view('admin/parking-add');
});

Route::get('/admin-parking-space-update', function () {
    return view('admin/parking-update');
});

Route::get('/admin-request', function () {
    return view('admin/request');
});

Route::get('/admin-request-renewal', function () {
    return view('admin/request-renewal');
});

Route::get('/admin-request-event', function () {
    return view('admin/request-event');
});

Route::get('/admin-request-license', function () {
    return view('admin/request-license');
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
*/

