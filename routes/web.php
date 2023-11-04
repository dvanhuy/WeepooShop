<?php

use App\Http\Controllers\AuthController;
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

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('login', [AuthController::class,'getFormLogin'])->name('get_form_login');
Route::post('login', [AuthController::class,'login'])->name('login');

Route::get('register', [AuthController::class,'getFormRegister'])->name('get_form_register');
Route::post('register', [AuthController::class,'register'])->name('register');

Route::post('/get-google-sign-in-url', [\App\Http\Controllers\Api\GoogleController::class, 'getGoogleSignInUrl']);
Route::get('/callback', [\App\Http\Controllers\Api\GoogleController::class, 'loginCallback']);


Route::group(['middleware'=>'userLogin'],function (){
    Route::get('logout', [AuthController::class,'logout'])->name('logout'); 
    Route::get('/', [AuthController::class,'getHomePage']);
    Route::get('/homepage', [AuthController::class,'getHomePage'])->name('get_home_page');
});
