<?php

use App\Http\Controllers\Front\MainController;
use Illuminate\Support\Facades\Auth;
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

// Dashboard Routes
require_once ('dashboard.php');

// Front Routes
Route::group(['namespace' => 'front'], function(){
    Route::get('/', [MainController::class, 'home']);
});