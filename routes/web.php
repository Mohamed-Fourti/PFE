<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Classes\ListClassesController;
use App\Http\Controllers\Admin\Classes\ListetudiantsController;
use App\Http\Controllers\Admin\Users\EnseignantsController;
use App\Http\Controllers\Admin\Users\EtudiantsController;
use App\Http\Controllers\Admin\Users\TechniciensController;
use App\Http\Controllers\Admin\Event\EventController;
use App\Http\Controllers\Admin\Publication\PublicationController as BackPublicationController;
use App\Http\Controllers\Front\PublicationController as FrontPublicationController;
use App\Http\Controllers\Admin\FicheDeVœux\FicheDeVœuxController as BackFicheDeVœuxController;
use App\Http\Controllers\Admin\FicheDeVœux\ListmatièresController;
use App\Http\Controllers\Front\FicheDeVœuxController as FrontFicheDeVœuxController;
use App\Http\Controllers\Front\InscriptionController as FrontInscriptionController;
use App\Http\Controllers\Admin\Publication\InscriptionController as BackInscriptionController;
use App\Http\Controllers\Front\ColloqueScientifiques;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Réclamation\RéclamationController;
use App\Http\Controllers\Réclamation\TraitementController;
use App\Http\Controllers\TableauAffichage\TableauAffichageEtController;
use App\Http\Controllers\RattrapageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\Rattrapage\RattrapagesController as BackRattrapagesController;
use App\Http\Controllers\Admin\Contact\ContactsController as BackContactsController;
use App\Http\Controllers\TableauAffichage\TableauAffichageController;
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
/* Page admin*/

Route::middleware('guest')->group(function () {
    Route::prefix('Administrateur')->group(function () {
        Route::get('/', 'App\Http\Controllers\Auth\LoginAdminController@showAdminLoginForm');
        Route::post('/', 'App\Http\Controllers\Auth\LoginAdminController@login')->name('loginAdmin');
    });
});



Route::get('/', function () {
    return view('accueil');
});

Route::get('/home', function () {
    return view('home');
});

Auth::routes();

Route::post('inscriptionPub', [FrontInscriptionController::class, 'store'])->name('inscriptionPub');

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

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::name('admin')->get('/admin', [AdminController::class, 'index']);

    Route::resource('usersEt', EtudiantsController::class);
    Route::post('updateEt', 'App\Http\Controllers\Admin\Users\EtudiantsController@update')->name('updateEt');
    Route::get('searchEt', 'App\Http\Controllers\Admin\Users\EtudiantsController@search');

    Route::resource('usersEn', EnseignantsController::class);
    Route::post('updateEn', 'App\Http\Controllers\Admin\Users\EnseignantsController@update')->name('updateEn');
    Route::get('searchEn', 'App\Http\Controllers\Admin\Users\EnseignantsController@search');

    Route::resource('usersTe', TechniciensController::class);
    Route::post('updateTe', 'App\Http\Controllers\Admin\Users\TechniciensController@update')->name('updateTe');
    Route::get('searchTe', 'App\Http\Controllers\Admin\Users\TechniciensController@search');

    Route::resource('event', EventController::class);

    Route::resource('Liste-etudiants', ListetudiantsController::class);
    Route::post('Liste-etudiants/misajour', [ListetudiantsController::class, 'misajour'])->name('Liste-etudiants.misajour');

    Route::resource('Liste-class', ListClassesController::class);
    Route::post('Liste-class/delete', [ListClassesController::class, 'destroy'])->name('Liste-class/delete');
    Route::post('Liste-class/ajoute', [ListClassesController::class, 'ajoute'])->name('Liste-class/ajoute');


    Route::resource('publication', BackPublicationController::class);
    Route::post('publication/{id}', [BackPublicationController::class, 'destroy']);

    Route::resource('Inscriptions-list', BackInscriptionController::class);
    Route::post('Inscriptions-list/{id}', [BackPublicationController::class, 'destroy']);

    Route::resource('Fiche-De-Vœux', BackFicheDeVœuxController::class);
    Route::get('Fiche-De-Vœux/Ouverture/{id}', [BackFicheDeVœuxController::class, 'Ouverture'])->name('Ouverture');
    Route::get('Fiche-De-Vœux/Fermeture/{id}', [BackFicheDeVœuxController::class, 'Fermeture'])->name('Fermeture');
    Route::post('EtuMat', [BackFicheDeVœuxController::class, 'storePlanEtuFichesMat'])->name('EtuMat');
    Route::get('Fiche-De-Vœux/résultats', [BackFicheDeVœuxController::class, 'résultats'])->name('Fiche-De-Vœux.résultats');
    Route::get('Fiche-De-Vœux/show/{id}', [BackFicheDeVœuxController::class, 'show'])->name('Fiche-De-Vœux.show');
    Route::resource('Listmatières', ListmatièresController::class);
    Route::post('publication/{id}', [BackPublicationController::class, 'destroy']);

    Route::resource('Inscriptions-list', BackInscriptionController::class);
    Route::post('Inscriptions-list/{id}', [BackPublicationController::class, 'destroy']);

    Route::resource('Fiche-De-Vœux', BackFicheDeVœuxController::class);
    Route::get('Fiche-De-Vœux/Ouverture/{id}', [BackFicheDeVœuxController::class, 'Ouverture'])->name('Ouverture');
    Route::get('Fiche-De-Vœux/Fermeture/{id}', [BackFicheDeVœuxController::class, 'Fermeture'])->name('Fermeture');
    Route::post('EtuMat', [BackFicheDeVœuxController::class, 'storePlanEtuFichesMat'])->name('EtuMat');
    Route::get('Fiche-De-Vœux/résultats', [BackFicheDeVœuxController::class, 'résultats'])->name('Fiche-De-Vœux.résultats');
    Route::get('Fiche-De-Vœux/show/{id}', [BackFicheDeVœuxController::class, 'show'])->name('Fiche-De-Vœux.show');
    Route::resource('Listmatières', ListmatièresController::class);

    Route::resource('rattrapages', BackRattrapagesController::class);
    Route::post('rattrapages/{id}', [BackRattrapagesController::class, 'destroy']);
    Route::get('rattrapages/show/{id}', [BackRattrapagesController::class, 'show'])->name('rattrapages.show');
    Route::get('rattrapages/pdf/{id}', [BackRattrapagesController::class, 'pdf'])->name('rattrapages.pdf');
    // Route::name('rattrapages.pdf')->post('rattrapages/pdf', 'RattrapagesController@pdf');




});


Route::group(['middleware' => ['role:Enseignants|admin']], function () {
    /* Tickets */
    Route::get('réclamation', [RéclamationController::class, 'index']);
    Route::post('réclamation/enregistrer', [RéclamationController::class, 'store'])->name('réclamation/enregistrer');


    Route::get('Fiche-De-Vœux/{sem}', [FrontFicheDeVœuxController::class, 'index']);
    Route::post('Fiche-De-Vœux/enregistrer', [FrontFicheDeVœuxController::class, 'store'])->name('fiche-De-Vœux/enregistrer');

    Route::get('/', [FrontPublicationController::class, 'index']);
    Route::get('rattrapage/{sem}', [RattrapageController::class, 'index']);
    Route::post('rattrapage/enregistrer', [RattrapageController::class, 'store'])->name('rattrapage/enregistrer');

    Route::get('Fiche-De-Vœux/{sem}', [FrontFicheDeVœuxController::class, 'index']);
    Route::post('Fiche-De-Vœux/enregistrer', [FrontFicheDeVœuxController::class, 'store'])->name('fiche-De-Vœux/enregistrer');

    Route::get('/', [FrontPublicationController::class, 'index']);

    Route::resource('ColloqueScientifique', ColloqueScientifiques::class);
    Route::get('ColloqueScientifique', [ColloqueScientifiques::class, 'pdf'])->name('ColloqueScientifique/pdf');

    Route::resource('TableauAffichage', TableauAffichageController::class);

    Route::resource('Contact', BackContactsController::class);
});

Route::group(['middleware' => ['auth', 'role:Techniciens']], function () {
    Route::get('réclamations', [RéclamationController::class, 'index']);
    Route::get('réclamations/{id}/consulter', [RéclamationController::class, 'consulter'])->name('réclamations/{id}/consulter');
    Route::get('réclamations/{id}/traiter', [TraitementController::class, 'create']);
    Route::post('traitement/enregistrer', [TraitementController::class, 'store'])->name('traitement/enregistrer');
});

Route::group(['middleware' => ['auth', 'role:Enseignants|admin|Techniciens|Etudiants']], function () {



    Route::get('profile/{id}', [ProfileController::class, 'index']);
    Route::post('profile/modifier', [ProfileController::class, 'update'])->name('profile/modifier');
});
Route::group(['middleware' => ['auth', 'role:Etudiants']], function () {
    Route::get('TableauAffichage/class/{class}', [TableauAffichageEtController::class, 'index']);
    Route::get('TableauAffichage/télécharger/{id}', [TableauAffichageEtController::class, 'télécharger'])->name('TableauAffichage.télécharger');
});

Route::get('Publication', function () {
    return View('Publication.publications');
});
Route::get('Évènement', function () {
    return View('Publication.Évènements.évènement');
});
Route::get('Formation', function () {
    return View('Publication.Évènements.formation');
});

Route::get('contact', [ContactController::class, 'index']);
Route::post('contact/enregistrer', [ContactController::class, 'store'])->name('contact.enregistrer');

Route::resource('test', testing::class);


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => 'auth'], function () {
    Lfm::routes();
});

Route::get('/', [FrontPublicationController::class, 'index']);

Route::prefix('Publications')->group(function () {
    Route::get('{slug}', [FrontPublicationController::class, 'show'])->name('Publication/show');
    Route::get('réclamations', [RéclamationController::class, 'index']);
    Route::get('/', [FrontPublicationController::class, 'showall'])->name('Publications');
    Route::get('cat/{cat}', [FrontPublicationController::class, 'showallByCategories'])->name('Publications/cat');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('notifications', [NotificationController::class, 'notifications']);
    Route::get('notifications/{id}', [NotificationController::class, 'show']);
});
