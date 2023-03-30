<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\AccountController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/account/regist', [AccountController::class, 'regist']);
Route::post('/account/create', [AccountController::class, 'create']);
Route::get('/', [AccountController::class, 'showlogin'])->name('showlogin');
Route::post('/account/login', [AccountController::class, 'login'])->name('login');