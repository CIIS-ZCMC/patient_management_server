<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('validate')->group(function () {
    // Address Module
    Route::get('addresses', 'AddressController@index');
    Route::post('addresses', 'AddressController@store');
    Route::get('addresses/{id}', 'AddressController@show');
    Route::put('addresses/{id}', 'AddressController@update');
    Route::delete('addresses/{id}', 'AddressController@destroy');
    
    // Address Module
    Route::get('patient', 'PatientController@index');
    Route::post('patient', 'PatientController@store');
    Route::get('patient/{id}', 'PatientController@show');
    Route::put('patient/{id}', 'PatientController@update');
    Route::delete('patient/{id}', 'PatientController@destroy');
    
    // Address Module
    Route::get('patient-biometric', 'PatientBiometricController@index');
    Route::post('patient-biometric', 'PatientBiometricController@store');
    Route::get('patient-biometric/{id}', 'PatientBiometricController@show');
    Route::put('patient-biometric/{id}', 'PatientBiometricController@update');
    Route::delete('patient-biometric/{id}', 'PatientBiometricController@destroy');
});
