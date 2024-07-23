<?php

use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Front\ArticleController as FrontArticleController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/p/{slug}', [FrontArticleController::class, 'show']);
Route::get('/artikel', [FrontArticleController::class, 'index']);

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index']); 
    Route::resource('/articles', ArticleController::class);
    Route::resource('/categories', CategoryController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::resource('/users', UserController::class);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
