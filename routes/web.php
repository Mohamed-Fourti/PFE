<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Classes\ClassesController;
use App\Http\Controllers\Admin\Users\EnseignantsController;
use App\Http\Controllers\Admin\Users\EtudiantsController;
use App\Http\Controllers\Admin\Users\TechniciensController;
use App\Http\Controllers\Admin\Event\EventController;
use App\Http\Controllers\Admin\Publication\CategoriesController;
use App\Http\Controllers\Admin\Publication\PublicationController as BackPublicationController;
use App\Http\Controllers\Front\PublicationController as FrontPublicationController;
use App\Http\Controllers\Réclamation\RéclamationController;
use App\Http\Controllers\Réclamation\TraitementController;
use App\Http\Controllers\testing;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;


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
    return view('accueil');
});


Auth::routes();

Route::get('/home', 'App\Http\Controllers\RootingController@index')->name('home');

/* login/register */

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

/* Admin */

Route::group(['middleware' => ['auth', 'role:admin']], function() { 
    Route::name('admin')->get('/admin', [AdminController::class, 'index']);
    
    Route::resource('usersEt', EtudiantsController::class);
    Route::post('updateEt','App\Http\Controllers\Admin\Users\EtudiantsController@update')->name('updateEt');
    Route::get('searchEt', 'App\Http\Controllers\Admin\Users\EtudiantsController@search');

    Route::resource('usersEn', EnseignantsController::class);
    Route::post('updateEn','App\Http\Controllers\Admin\Users\EnseignantsController@update')->name('updateEn');
    Route::get('searchEn', 'App\Http\Controllers\Admin\Users\EnseignantsController@search');

    Route::resource('usersTe', TechniciensController::class);
    Route::post('updateTe','App\Http\Controllers\Admin\Users\TechniciensController@update')->name('updateTe');
    Route::get('searchTe', 'App\Http\Controllers\Admin\Users\TechniciensController@search');

    Route::resource('event', EventController::class);
    
    Route::resource('class', ClassesController::class);
    Route::get('delete/{name}/{id}','App\Http\Controllers\Admin\Classes\ClassesController@delete')->name('delete');

    Route::resource('publication', BackPublicationController::class);
    Route::post('publication/{id}',[BackPublicationController::class,'destroy']);

    Route::resource('categories', CategoriesController::class);
    Route::post('categories/{id}',[CategoriesController::class,'destroy']);


});

/* Tickets */
Route::group(['middleware' => ['auth', 'role:Enseignants']], function() {
    Route::get('réclamation',[RéclamationController::class,'index']);
    Route::post('réclamation/enregistrer',[RéclamationController::class,'store'])->name('réclamation/enregistrer');
});

Route::group(['middleware' => ['auth', 'role:Techniciens']], function() {
    Route::get('réclamations',[RéclamationController::class,'index']);
    Route::get('réclamations/{id}/consulter',[RéclamationController::class,'consulter']);
    Route::get('réclamations/{id}/traiter',[TraitementController::class,'create']);
    Route::post('traitement/enregistrer',[TraitementController::class,'store'])->name('traitement/enregistrer');

});






Route::get('Publication', function(){
    return View('Publication.publications'); 
});
Route::get('Évènement', function(){
    return View('Publication.Évènements.évènement'); 
});
Route::get('Formation', function(){
    return View('Publication.Évènements.formation'); 
});

Route::get('Nouveautés', function(){
    return View('Publication.Nouveautés.nouveautés'); 
});
Route::get('Nouveauté', function(){
    return View('Publication.Nouveautés.nouveauté'); 
});
Route::get('contact', function(){
    return View('contact'); 
});

Route::resource('test', testing::class);


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => 'auth'], function () {
    Lfm::routes();
});

Route::get('/', [FrontPublicationController::class,'index']);

Route::prefix('Publications')->group(function () {
    Route::name('Publication/.display')->get('{slug}', [FrontPublicationController::class, 'show']);
    Route::get('réclamations',[RéclamationController::class,'index']);

    Route::get('/',[FrontPublicationController::class, 'showall'])->name('Publications');;

});
