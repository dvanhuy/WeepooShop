<?php

use App\Http\Controllers\UserController;
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

Route::get('login', [UserController::class,'getFormLogin'])->name('get_form_login');
Route::post('login', [UserController::class,'login'])->name('login');

Route::get('register', [UserController::class,'getFormRegister'])->name('get_form_register');


Route::group(['middleware'=>'userLogin'],function (){
    Route::get('logout', [UserController::class,'logout'])->name('logout'); 
    Route::get('/', [UserController::class,'getHomePage']);
    Route::get('/homepage', [UserController::class,'getHomePage'])->name('get_home_page');
});
