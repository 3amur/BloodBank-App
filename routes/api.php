<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DonationRequestController;
use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\TokenController;
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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Auth Cycle Routes (Registrations)
Route::post('client-register', [AuthController::class, 'register']);
Route::post('client-login', [AuthController::class, 'login']);
// Reset Password && New Password
Route::post('reset-password', [AuthController::class, 'resetPassword']);
Route::post('new-password', [AuthController::class, 'newPassword']);

Route::get('blood-types', [MainController::class, 'bloodTypes']);
Route::get('governments', [MainController::class, 'governments']);
Route::get('cities', [MainController::class, 'cities']);

// General Api Routes
Route::middleware('auth:sanctum')->group(function () 
{
    Route::post('post', [PostController::class, 'createPost']);
    Route::get('posts', [PostController::class, 'posts']);
    Route::post('favourite',[PostController::class, 'favouritePost']);
    Route::get('favouritePosts',[PostController::class, 'favouritePosts']);
    Route::post('registerToken',[TokenController::class, 'registerToken']);
    Route::post('removeToken',[TokenController::class, 'removeToken']);
    Route::post('donationRequest-create', [DonationRequestController::class, 'createDonationRequest']);
    Route::get('donationRequests', [DonationRequestController::class, 'donationRequests']);
    Route::get('donationRequest', [DonationRequestController::class, 'donationRequest']);
    Route::post('settings', [MainController::class, 'settings']);
    Route::get('categories', [MainController::class, 'categories']);
    Route::post('contact-us', [MainController::class, 'contactUs']);
    Route::post('profile', [AuthController::class, 'profile']);
    Route::post('notification-settings', [MainController::class, 'notificationSettings']);
});