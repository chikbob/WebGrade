<?php

use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


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

Route::get('/', SiteController::class);
Route::get('/search', [SearchController::class, 'search']);

Route::get('register', [SiteController::class, 'register']);
Route::post('register/success', [UserController::class, 'register']);

Route::group(['middleware' => 'web'], function () {
    Route::get('login', [SiteController::class, 'login']);
    Route::post('login/success', [UserController::class, 'login']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::get('logout', [UserController::class, 'logout']);
});

Route::resource('review', SearchController::class);

Route::get('/help', [SiteController::class, 'help']);
Route::get('/about', [SiteController::class, 'about']);
Route::get('/contacts', [SiteController::class, 'contacts']);
