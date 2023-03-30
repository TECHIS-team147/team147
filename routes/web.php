<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update']);
Route::post('user/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('contacts.delete');
