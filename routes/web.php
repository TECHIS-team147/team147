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
    // return view('welcome');
// });

Route::get('/account/regist', [AccountController::class, 'regist']);
Route::post('/account/create', [AccountController::class, 'create']);
Route::get('/', [AccountController::class, 'showlogin'])->name('showlogin');
Route::post('/account/login', [AccountController::class, 'login'])->name('login');
Route::get('/logout', [AccountController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'home']);
    Route::get('/home/list', [App\Http\Controllers\HomeController::class, 'list']);
    Route::get('/home/detail/{id}', [App\Http\Controllers\HomeController::class, 'detail']);
    Route::get('/home/list', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home/list.index');
});

    // 管理者ユーザーのみ
Route::group(['middleware' => ['auth', 'can:admin']], function () {
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update']);
    Route::post('user/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('contacts.delete');

    Route::get('/item/itemRegister', [App\Http\Controllers\ItemController::class, 'register_form'])->name('itemRegister');
    Route::post('/item/itemRegister', [App\Http\Controllers\ItemController::class, 'itemRegister'])->name('itemRegister');
    Route::get('/item/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name('edit');
    Route::post('/item/itemEdit',[App\Http\Controllers\ItemController::class, 'itemEdit'])->name('itemEdit');
    Route::post('/item/itemDelete', [App\Http\Controllers\ItemController::class, 'itemDelete'])->name('itemDelete');
    Route::get('/item/{type?}', [App\Http\Controllers\ItemController::class, 'index'])->name('index');
});
