<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\PublicationController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/activite_culturelle', function(){
    return view('activite_culturelle');
});

/*-------route pour les differente rublique du site---------*/
//Route::get('/publication', [PublicationController::class, 'publication'])->name('publication');


/*---------route pour les discusions--------*/
Route::get('/discusion', [MessageController::class, 'index'])->name('message.index');
//Route::get('/ecrire', [MessageController::class, 'ecrire'])->name('ecrire');
Route::get('/discusion/{recipientId}', [MessageController::class, 'show'])->name('message.show');
Route::post('/discusion/{recipientId}/store', [MessageController::class, 'store'])->name('message.store');


/*-----------route pour partie story---------*/
Route::resource('/story', StoryController::class);
//Route::POST('/story', [StoryController::class, 'index'])->name('story.index');

/*------------route pour les publications------------------*/
Route::resource('/publication', PublicationController::class)->except('destroy', 'show');
Route::get('/publication/{id}', [PublicationController::class, 'destroy'])->name('publication.destroy');
Route::post('/publication/search', [PublicationController::class, 'search'])->name('publication.search');


Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Réinitialisation du mot de passe
Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'ResetPasswordController@reset');

