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




Route::get('/', 'site\HomeController@index');
Route::get('/contact', 'site\HomeController@contactPage');
Route::get('/about', 'site\HomeController@aboutPage');
Route::get('/vehicle', 'site\HomeController@vehiclePage');
Route::get('/vehicle/{vehicle_id}', 'site\HomeController@singelvehicle');

Route::get('/booking', 'site\HomeController@bookingPage');
Route::get('/booking/new', 'site\HomeController@bookingPageOne');
Route::get('/booking/new/vehicle/{vehicle_id}', 'site\HomeController@bookingPageTwo');
Route::get('/booking/new/vehicle/{vehicle_id}/driver/{driver_id}', 'site\HomeController@bookingContactPage');
Route::post('/booking/add', 'site\HomeController@bookingAdd');

Route::get('/feedbacks', 'site\HomeController@feedbackPage');
Route::post('/feedback/add', 'site\HomeController@feedbackAdd')->middleware(['auth']);

Route::get('/faq', 'site\HomeController@faqPage');
// Route::middleware(['auth', 'checkifclient'])->group(function () {

// });



/*
|--------------------------------------------------------------------------
| AUTH Routes
|--------------------------------------------------------------------------
*/
Route::get('/login', 'auth\AuthController@loginIndex');
Route::post('/login', 'auth\AuthController@login');
Route::get('/logout', 'auth\AuthController@logout')->middleware(['auth']);

Route::post('/register', 'auth\AuthController@registerClient');

Route::get('/verify-your-email', 'auth\AuthController@verifyEmailView');

Route::get('/verify-email', 'auth\AuthController@verifyEmail');



/*
|--------------------------------------------------------------------------
| HQ Routes
|--------------------------------------------------------------------------
*/
Route::get('/register-admin', 'auth\AuthController@registerAdmin');


Route::middleware(['auth', 'checkifadmin'])->group(function () {
    Route::get('/admin', 'hq\MainController@index');

    Route::get('/admin/vehicle', 'hq\MainController@vehicleIndex');
    Route::post('/admin/vehicle/add', 'hq\MainController@vehicleAdd');
    Route::get('/admin/vehicle/view/{vehicle_id}', 'hq\MainController@vehicleView');
    Route::get('/admin/vehicle/delete/{vehicle_id}', 'hq\MainController@vehicleDelete');
    Route::post('/admin/vehicle/edit/{vehicle_id}', 'hq\MainController@vehicleEdit');

    Route::get('/admin/driver', 'hq\MainController@driverIndex');
    Route::post('/admin/driver/add', 'hq\MainController@driverAdd');
    Route::post('/admin/driver/edit/{driver_id}', 'hq\MainController@driverEdit');

    Route::get('/admin/vehicle/{vehicle_id}/add-driver/{driver_id}', 'hq\MainController@vehicleDriverAdd');
    Route::get('/admin/vehicle/{vehicle_id}/remove-driver/{driver_id}', 'hq\MainController@vehicleDriverRemove');

    Route::get('/admin/booking', 'hq\MainController@BookingIndex');
    Route::get('/admin/booking/cancel/{booking_id}', 'hq\MainController@bookingCancel'); 
    Route::get('/admin/booking/payment/completed/{booking_id}', 'hq\MainController@bookingPaymentCompleted');
    Route::get('/admin/booking/payment/uncomplete/{booking_id}', 'hq\MainController@bookingPaymentUncompleted');

    Route::get('/admin/clients', 'hq\MainController@clientsIndex');
});
