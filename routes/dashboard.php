<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\CityController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\GovernmentController;
use App\Http\Controllers\Dashboard\DonationRequestController;

/*
|--------------------------------------------------------------------------
| Admins Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['verify' => true]);

Route::name('dashboard.')->middleware(['auth',])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Governments Routes
    Route::get('/governments', [GovernmentController::class, 'index'])->name('governments');
    Route::get('/create-government', [GovernmentController::class, 'create'])->name('creategovernment');
    Route::post('/add-government', [GovernmentController::class, 'add'])->name('addgovernment');
    Route::get('/edit-government/{id}', [GovernmentController::class, 'edit'])->name('editgovernment');
    Route::put('/update-government/{id}', [GovernmentController::class, 'update'])->name('updategovernment');
    Route::delete('/delete-government/{id}', [GovernmentController::class, 'destroy'])->name('deletegovernment');
    // City Routes
    Route::get('/cities', [CityController::class, 'index'])->name('cities');
    Route::get('/create-city', [CityController::class, 'create'])->name('createcity');
    Route::post('/add-city', [CityController::class, 'store'])->name('addcity');
    Route::get('/edit-city/{id}', [CityController::class, 'edit'])->name('editcity');
    Route::put('/update-city/{id}', [CityController::class, 'update'])->name('updatecity');
    Route::delete('/delete-city/{id}', [CityController::class, 'destroy'])->name('deletecity');
    // Clients Routes
    Route::get('/clients', [ClientController::class, 'index'])->name('clients');
    Route::get('/search-clients', [ClientController::class, 'search'])->name('searchclient');
    Route::get('/active-client/{id}', [ClientController::class, 'active'])->name('activeclient');
    Route::get('/deactive-client/{id}', [ClientController::class, 'deactive'])->name('deactiveclient');
    Route::delete('/delete-client/{id}', [ClientController::class, 'destroy'])->name('deleteclient');
    // Settings Routes
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::get('/show-settings/{id}', [SettingController::class, 'edit'])->name('showSettings');
    Route::put('/update-settings/{id}', [SettingController::class, 'update'])->name('updateSettings');
    // Contacts Routes
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
    Route::get('/search-contacts', [ContactController::class, 'search'])->name('searchContacts');
    Route::delete('/delete-contact/{id}', [ContactController::class, 'destroy'])->name('deleteContact');
    // Donation Requests Routes
    Route::get('/donation-requests', [DonationRequestController::class, 'index'])->name('donations');
    Route::get('/Show-donationRequest', [DonationRequestController::class, 'index'])->name('showDonationRequest');
    Route::get('/search-donation-request', [DonationRequestController::class, 'search'])->name('searchDonationRequest');
    Route::delete('/delete-donation-request/{id}', [DonationRequestController::class, 'destroy'])->name('deleteDonationRequest');
    // Categories Routes
    Route::resource('/categories', CategoryController::class);
    // Posts routes
    Route::resource('/posts', PostController::class);
    // Users Routes
    Route::resource('/users', UserController::class);
    // Change Password Routes
    Route::get('/change-password', [UserController::class, 'changePassword'])->name('changePassword');
    Route::post('/update-password/{id}', [UserController::class, 'updatePassword'])->name('updatePassword');
    // Roles Routes
    Route::resource('/role', RoleController::class);
});