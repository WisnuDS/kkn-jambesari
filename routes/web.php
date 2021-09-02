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

// Route::get('/', function () {
//     return view('welcome');
// });

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

// front

Route::name('front.')->group(function() {
    // landing page
    Route::get('/', [\App\Http\Controllers\Front\HomeController::class, 'index'])->name('index');

    // perangkat desa
    Route::get('/perangkat-desa', [\App\Http\Controllers\Front\HomeController::class, 'perangkatDesa'])->name('perangkat_desa.index');


    // blog
    Route::name('blog.')->prefix('blog')->group(function() {
        Route::get('/', [\App\Http\Controllers\Front\BlogController::class, 'index'])->name('index');
        Route::get('/category/{id}', [\App\Http\Controllers\Front\BlogController::class, 'category'])->name('category');
        Route::get('/{id}', [\App\Http\Controllers\Front\BlogController::class, 'show'])->name('show');
    });

    // kritik saran
    Route::name('kritik-saran.')->prefix('kritik-saran')->group(function() {
        Route::get('/', [\App\Http\Controllers\Front\KritikSaranController::class, 'create'])->name('create');
        Route::post('/store', [\App\Http\Controllers\Front\KritikSaranController::class, 'store'])->name('store');
    });

    // layanan (services)
    Route::name('services.')->prefix('services')->group(function() {
        Route::get('/', [\App\Http\Controllers\Front\ServiceController::class, 'index'])->name('index');
        Route::get('/apply/{documentId}', [\App\Http\Controllers\Front\ServiceController::class, 'apply'])->name('apply');
    });

    // profil data rt rw
    Route::get('/profil-data-rt-rw', [\App\Http\Controllers\Front\HomeController::class, 'profilDataRtRw'])->name('profil_rt_rw');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
