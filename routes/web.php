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

//userController getAllUsers

Route::get('/admin', 'App\Http\Controllers\UserController@getAllUsers')->name('admin');

//userController setUserRole
Route::post('setUserRole', 'App\Http\Controllers\UserController@setUserRole')->name('setUserRole');

Route::get('/login', function () {
    return view('login');
});
Route::get('/kayıt', function () {
    return view('kayıt');
});

Route::POST('/kayıt','App\Http\Controllers\Auth\RegisterController@validate_registration')->name('register');


Route::POST('/login', 'App\Http\Controllers\Auth\LoginController@validate_login')->name('login');

Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
use App\Http\Controllers\MailController;

Route::post('/send-welcome-email', [MailController::class, 'sendWelcomeEmail']);

Route::get('/home','App\Http\Controllers\LicenceController@getLicences');

 
Route::post('/createLicence', 'App\Http\Controllers\LicenceController@store')->name('licence.store');

//licence.edit
Route::get('/licence/edit/{id}', 'App\Http\Controllers\LicenceController@editLicence')->name('licence.edit');

//licence.delete
Route::delete('/licence/delete/{id}', 'App\Http\Controllers\LicenceController@deleteLicence')->name('licence.delete');

//licence.update
Route::put('/licence/update/{id}', 'App\Http\Controllers\LicenceController@updateLicence')->name('licence.update');




