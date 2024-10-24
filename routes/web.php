<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItineraireController; 
use App\Http\Controllers\EtapeController; 
use App\Http\Controllers\MoyenTransportController; 
use App\Http\Controllers\LabelEcologiqueController; 

use App\Http\Controllers\HebergementController; 
use App\Http\Controllers\ActiviteController; 
use App\Http\Controllers\ReservationController;





//use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\RateController;

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



Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('home', function () {
		return view('FrontOffice.home');
	})->name('dashboard');

	Route::get('stats', function () {
		return view('stats');
	})->name('stats');

	Route::get('/itineraire', [ItineraireController::class, 'index']);
	Route::get('/itineraire/create', [ItineraireController::class, 'create'])->name('itineraire.create');
	Route::post('/itineraire/store', [ItineraireController::class, 'store'])->name('itineraire.store');

	// Route pour afficher le formulaire d'édition
	Route::get('itineraire/{id}/edit', [ItineraireController::class, 'edit'])->name('itineraire.edit');

	// Route pour la mise à jour de l'itinéraire (requête PATCH)
	Route::patch('itineraire/{id}', [ItineraireController::class, 'update'])->name('itineraire.update');

	Route::delete('/itineraire/{id}', [ItineraireController::class, 'destroy']);


	Route::resource("/etape", EtapeController::class);
	Route::resource("/moyenTransport", MoyenTransportController::class);
	Route::resource("/hebergement", HebergementController::class);
	Route::resource("/label_ecologique", LabelEcologiqueController::class);

Route::get('/label-ecologique/create', [LabelEcologiqueController::class, 'create'])->name('label.create');
Route::post('/label-ecologique', [LabelEcologiqueController::class, 'store'])->name('label.store');
Route::get('/hebergementDetails/{id}', [HebergementController::class, 'hebergementDetails'])->name('hebergement.show');
Route::get('/hebergementDetails/{id}/edit', [HebergementController::class, 'update'])->name('hebergement.edit');


	Route::resource("/activite", ActiviteController::class);
	Route::resource('/reservationss', ReservationController::class);
	Route::get('/activite/{id}/reserver', [ReservationController::class, 'create'])->name('activite.reserver');
	Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
	Route::get('/activites/front', [ActiviteController::class, 'index_front'])->name('activite.index_front');


	Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
	Route::get('/reservations/create/{activite_id}', [ReservationController::class, 'create'])->name('reservations.create');
	Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
	Route::get('/reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show'); // Cette ligne définit la route show
	Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');



	Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');

	Route::resource("/destination", DestinationController::class);
	Route::get('/displaydestinations', [DestinationController::class, 'DisplayDestination'])->name('destination.display');
	Route::get('/destinationDetails/{id}', [DestinationController::class, 'destinationDetails'])->name('destination.details');
	Route::post('/destinations/{destination}/rate', [RateController::class, 'store'])->name('rate.store');

	Route::get('/itinerairelistfront', [ItineraireController::class, 'itinerairelistfront']);

	Route::get('/etape/create/{itineraire}', [EtapeController::class, 'create'])->name('etape.create');
	Route::post('/itineraire', [EtapeController::class, 'store'])->name('etape.store');

	Route::get('/stats', [EtapeController::class, 'stats'])->name('stats');

	Route::get('/activite/{id}/details', [ActiviteController::class, 'show_back'])->name('activite.show_back');
	
	
	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');