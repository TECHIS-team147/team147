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


Route::get('/item/itemRegister', [App\Http\Controllers\ItemController::class, 'register_form'])->name('itemRegister');
Route::get('/item/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name('edit');
Route::post('/item/itemEdit',[App\Http\Controllers\ItemController::class, 'itemEdit'])->name('itemEdit');
Route::post('/item/itemDelete', [App\Http\Controllers\ItemController::class, 'itemDelete'])->name('itemDelete');
