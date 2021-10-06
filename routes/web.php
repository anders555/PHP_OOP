<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin;
use App\Http\Controllers;
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

Route::get('/', [HomeController::class, 'index'] )
    ->middleware([\App\Http\Middleware\CheckAge::class])
    ->name('main_page');

Route::get('/register', [LoginController::class, 'register'] )->name('register');
Route::post('/register', [LoginController::class, 'registration'] )->name(('registration'));
Route::get('/login', [LoginController::class, 'login'] )->name(('login'));
Route::post('/login', [LoginController::class, 'checkLogin'] )->name(('checkLogin'));

Route::get('/random', [CatalogController::class, 'product'] )
    ->middleware(\App\Http\Middleware\CheckRegistrationDate::class)
    ->name('random');

Route::get('/catalog/{category}/{product}', [CatalogController::class, 'product'] )->name('product');
Route::get('/catalog/{category}', [CatalogController::class, 'category'] )->name('catalog_category');
Route::get('/catalog', [CatalogController::class, 'index'] )->name('catalog');

Route::prefix('adm')->name('admin.')->group(function (){
    Route::view('/','admin.dashboard');
    Route::resources([
    'categories' => CategoryController::class,
    'products' => ProductController::class
]);
});



//Route::get('/about', [HomeController::class, 'aboutUs'] )->name('about_page');
//Route::get('/about', [HomeController::class, 'index'] )->name('about_page');


