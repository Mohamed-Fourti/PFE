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

Auth::routes();

Route::get('/home', 'App\Http\Controllers\RootingController@index')->name('home');

Route::post('deconnexion', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::middleware('guest')->group(function () {
    Route::prefix('connexion')->group(function () {
        Route::get('/', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
        Route::post('/', 'App\Http\Controllers\Auth\LoginController@login');
    });
    Route::prefix('inscription')->group(function () {
        Route::get('/', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('/', 'App\Http\Controllers\Auth\RegisterController@register');
        Route::get('/inscriptionEt', 'App\Http\Controllers\Auth\RegisterControllerEt@showRegistrationFormEt')->name('inscriptionEt');
        Route::post('/inscriptionp', 'App\Http\Controllers\Auth\RegisterControllerEt@register')->name('inscriptionp');
        Route::post('/inscriptionEt', 'App\Http\Controllers\Auth\RegisterControllerEt@import');
        

    });
});
Route::prefix('passe')->group(function () {
    Route::get('renouvellement', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('renouvellement/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('renouvellement', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');
});


Route::group(['middleware' => ['auth', 'role:admin']], function() { 
    Route::get('/admin/admin', 'App\Http\Controllers\admin@admin')->name('admin.admin');
});