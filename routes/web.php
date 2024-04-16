<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guard\ViolationController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

 
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
    Route::get('/', 'Auth\LoginController@show')->name('login.show');
    Route::get('/login', 'Auth\LoginController@show')->name('login.show');
    Route::post('/login', 'Auth\LoginController@login')->name('login.perform');

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'Auth\LogoutController@perform')->name('logout.perform');
        
        //User Profile
        Route::get('/user-profile', 'Admin\Profile\ProfileController@index')->name('user.profile.index');
        /**
         * Admin Homepage Dashboard
         */
        Route::get('/admin-homepage', 'Admin\Home\HomepageController@index')->name('admin.homepage');        
        /**
         * Guard Homepage Dashboard
         */
        Route::get('/guard-homepage', 'Admin\Home\HomepageController@index')->name('guard.homepage');//same homepage
        Route::get('/guard-homepage-exit', 'Admin\Home\HomepageController@exit')->name('guard.homepageExit');//same homepage
        Route::get('/guard-profile', 'Admin\Profile\ProfileController@index')->name('guard.profile.index');//same admin profile
        Route::get('/guard-events', 'Admin\Events\EventsController@today_events');
        Route::post('/guard-violation', [ViolationController::class, 'report']);
        Route::post('/guard-scan-user-entrance', 'Admin\Home\HomepageController@userEntrance')->name('user.entrance');
        Route::post('/guard-scan-user-exit', 'Admin\Home\HomepageController@userExit')->name('user.exit');
        Route::post('/guard-scan-visitour-entrance', 'Admin\Home\HomepageController@visitourEntrance')->name('visitour.entrance');
        Route::post('/guard-scan-visitour-exit', 'Admin\Home\HomepageController@visitourExit')->name('visitour.exit');
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
        Route::get('/admin-parking-space/{parking}', 'Admin\ParkingSpace\ParkingSpaceController@destroy');
         /**
         * Admin Request
         */
        Route::get('/admin-request', 'Admin\Request\RequestController@index')->name('admin.request');
        Route::put('/admin-request-vehicle/{vehicle}', 'Admin\Request\RequestController@approve_vehicle');
        Route::delete('/admin-request-vehicle/{vehicle}', 'Admin\Request\RequestController@decline_vehicle');

        Route::get('/admin-request-event', 'Admin\Request\RequestController@event')->name('event.request');
        Route::put('/admin-request-event/{event}', 'Admin\Request\RequestController@approve_event');
        Route::delete('/admin-request-event/{event}', 'Admin\Request\RequestController@decline_event');

        Route::get('/admin-request-license', 'Admin\Request\RequestController@license')->name('license.request');
        Route::put('/admin-request-license/{license}', 'Admin\Request\RequestController@approve_license');
        Route::delete('/admin-request-license/{license}', 'Admin\Request\RequestController@decline_license');

        Route::get('/admin-request-visitor', 'Admin\Request\RequestController@visitor')->name('visitor.request');
        Route::put('/admin-request-visitor/{visitor}', 'Admin\Request\RequestController@approvevisitor');
        Route::delete('/admin-request-visitor/{visitor}', 'Admin\Request\RequestController@decline_visitor');

        Route::get('/admin-request-renewal', 'Admin\Request\RequestController@renewal')->name('renewal.request');
        Route::put('/admin-request-renewal/{renewal}', 'Admin\Request\RequestController@approve_renewal');
        Route::delete('/admin-request-renewal/{renewal}', 'Admin\Request\RequestController@decline_renewal');

        Route::get('/admin-userpage', 'Admin\Users\UsersController@index')->name('admin.userpage');
        Route::get('/admin-user-add', 'Admin\Users\UsersController@create');
        Route::post('/admin-userpage/vehicle', 'Admin\Users\UsersController@store_vehicle');
        Route::get('/admin-user-add-vehicle', 'Admin\Users\UsersController@create_vehicle');
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

