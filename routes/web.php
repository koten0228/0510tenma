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

// Route::get('/', function () {
//     return view('account.login');
// });

Route::get('/', [App\Http\Controllers\AccountController::class, 'index'])->name('login');
Route::post('login', [App\Http\Controllers\AccountController::class, 'login']);
Route::get('/account/register', [App\Http\Controllers\AccountController::class, 'showRegister'])->name('register');
Route::post('account_register', [App\Http\Controllers\AccountController::class, 'register']);
Route::get('logout', [App\Http\Controllers\AccountController::class, 'logout'])->name('logout');

//ログインしてないと表示できないルーティング
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'gohome']);
    Route::get('/home/list', [App\Http\Controllers\HomeController::class, 'homelist']);
    Route::get('/home/detail', [App\Http\Controllers\HomeController::class,'viewdetail']);
    Route::get('/home/dsearch', [App\Http\Controllers\HomeController::class,'detailsearch']);
    Route::get('/home/dsearchcontroll', [App\Http\Controllers\HomeController::class,'detailsearchcontroll']);
});

//管理者のみ表示できるページ
Route::group(['middleware' => ['auth', 'can:admin']], function () {
    Route::get('/user/list',[UserController::class,'list']);
    Route::get('/item/create', [App\Http\Controllers\ItemController::class, 'create']);
    Route::get('/item/index',[App\Http\Controllers\ItemController::class,'index']);
    Route::post('/item/create', [App\Http\Controllers\ItemController::class, 'store']);
    Route::get('/item/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit']);
    Route::post('/item/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit_save']);
    Route::delete('/item/edit/{id}', [App\Http\Controllers\ItemController::class, 'destroy']);
    Route::get('/user/list',[App\Http\Controllers\UserController::class,'list']);
    Route::get('/user/edit/{id}',[App\Http\Controllers\UserController::class,'edit']);
    Route::post('/user/userEdit',[App\Http\Controllers\UserController::class,'userEdit']);
    Route::get('/user/userDelete/{id}',[App\Http\Controllers\UserController::class,'userDelete']);
});


