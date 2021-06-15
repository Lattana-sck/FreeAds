<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// route annonce :

Route::get('/annonce', [App\Http\Controllers\AnnonceController::class, 'create'])->name('Annonce.create');
Route::post('/annonce/create', [App\Http\Controllers\AnnonceController::class, 'store'])->name('Annonce.store');

Route::get('/annonce/viewAd', [App\Http\Controllers\AnnonceController::class, 'showAd'])->name('Annonce.showAd');
Route::get('annonce/viewMyAd', [App\Http\Controllers\AnnonceController::class, 'showMyAd'])->name('Annonce.showMyAd');

Route::get('annonce/deleteMyAd/{id}', [App\Http\Controllers\AnnonceController::class, 'delete'])->name('Annonce.deleteMyAd');

Route::get('annonce/showEditMyAd/{id}', [App\Http\Controllers\AnnonceController::class, 'showEdit'])->name('Annonce.showEditMyAd');
Route::post('annonce/editMyAd/{id}', [App\Http\Controllers\AnnonceController::class, 'edit'])->name('Annonce.EditMyAd');

Route::get('annonce/searchAds/', [App\Http\Controllers\AnnonceController::class, 'search'])->name('Annonce.searchAds');

Route::post('annonce/searchAdsByTitle/', [App\Http\Controllers\AnnonceController::class, 'searchName'])->name('Annonce.searchAdsByTitle');
Route::post('annonce/searchAdsByLocalisation/', [App\Http\Controllers\AnnonceController::class, 'searchLocalisation'])->name('Annonce.searchAdsByLocalisation');
Route::post('annonce/searchAdsByPrice/', [App\Http\Controllers\AnnonceController::class, 'searchPrice'])->name('Annonce.searchAdsByPrice');
//