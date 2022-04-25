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
        
        Route::get('/guard-homepage', 'Admin\Home\HomepageController@index');//same homepage
        Route::get('/guard-profile', 'Admin\Profile\ProfileController@index');//same admin profile
        Route::get('/guard-events', 'Admin\Events\EventsController@today_events');
        /**
         * Admin Profile
         */
        
        Route::prefix('admin-profile')->name('admin.profile.')->group(function () {
            Route::get('/', 'Admin\Profile\ProfileController@index')->name('index');
            Route::put('/update/{profile}', 'Admin\Profile\ProfileController@update')->name('update');
            Route::post('/vehicles/store', 'Admin\Users\VehicleController@store')->name('vehicles.store');
            Route::put('/vehicles/update/{vehicle}', 'Admin\Users\VehicleController@update')->name('vehicles.update');
            Route::put('/vehicles/renew/{vehicle}', 'Admin\Users\VehicleController@renew')->name('vehicles.renew');
            Route::delete('/vehicles/delete/{vehicle}', 'Admin\Users\VehicleController@store')->name('vehicles.destroy');
        });
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
        Route::post('/admin-parking-space', 'Admin\ParkingSpace\ParkingSpaceController@store');
        Route::get('/admin-parking-space/{parking}/edit', 'Admin\ParkingSpace\ParkingSpaceController@edit');
        Route::put('/admin-parking-space/{parking}', 'Admin\ParkingSpace\ParkingSpaceController@update');
        Route::delete('/admin-parking-space/{parking}', 'Admin\ParkingSpace\ParkingSpaceController@destroy');
         /**
         * Admin Request
         */
        Route::get('/admin-request', 'Admin\Request\RequestController@index')->name('admin.request');
        Route::put('/admin-request-vehicle/{id}', 'Admin\Request\RequestController@approve_vehicle');
        Route::delete('/admin-request-vehicle/{id}', 'Admin\Request\RequestController@decline_vehicle');

        Route::get('/admin-request-event', 'Admin\Request\RequestController@event')->name('event.request');
        Route::put('/admin-request-event/{id}', 'Admin\Request\RequestController@approve_event');
        Route::delete('/admin-request-event/{id}', 'Admin\Request\RequestController@decline_event');

        Route::get('/admin-request-license', 'Admin\Request\RequestController@license')->name('license.request');
        Route::put('/admin-request-license/{id}', 'Admin\Request\RequestController@approve_license');
        Route::delete('/admin-request-license/{id}', 'Admin\Request\RequestController@decline_license');

        Route::get('/admin-request-renewal', 'Admin\Request\RequestController@renewal')->name('renewal.request');
        Route::put('/admin-request-renewal/{id}', 'Admin\Request\RequestController@approve_renewal');
        Route::delete('/admin-request-renewal/{id}', 'Admin\Request\RequestController@decline_renewal');

        Route::get('/admin-userpage', 'Admin\Users\UsersController@index')->name('admin.userpage');
        Route::get('/admin-user-add', 'Admin\Users\UsersController@create');
        Route::post('/admin-userpage/register', 'Admin\Users\UsersController@store')->name('admin.register');
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

