<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(["prefix" => "admin", "middleware" => ["auth"]], function (){
    Route::view('/dashboard','admin.dashboard');

    //category
    Route::get('/category/data', [\App\Http\Controllers\Admin\CategoryController::class,'data']);
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class)->except('show');

    //content
    Route::get('/content/data/{id}', [\App\Http\Controllers\Admin\ContentController::class,'data']);
    Route::get('/content/{id}', [\App\Http\Controllers\Admin\ContentController::class,'index']);
    Route::get('/content/{id}/create', [\App\Http\Controllers\Admin\ContentController::class,'create']);
    Route::post('/content/upload', [\App\Http\Controllers\Admin\ContentController::class, 'cover']);
    Route::resource('content', \App\Http\Controllers\Admin\ContentController::class)->except(['index','create','show']);

    //association
    Route::get('/association/data', [\App\Http\Controllers\Admin\AssociationController::class,'data']);
    Route::resource('association', \App\Http\Controllers\Admin\AssociationController::class);

    //level
    Route::get('/level/data', [\App\Http\Controllers\Admin\LevelController::class,'data']);
    Route::resource('level', \App\Http\Controllers\Admin\LevelController::class);

    //staff
    Route::get('/staff/data', [\App\Http\Controllers\Admin\StaffController::class,'data']);
    Route::post('/staff/upload', [\App\Http\Controllers\Admin\ContentController::class, 'cover']);
    Route::resource('staff', \App\Http\Controllers\Admin\StaffController::class);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
