<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LxAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;

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

/**
 * Designing the Auth System
*/
Route::group(['prefix' => 'userauth'], function() {
    //
    Route::get('login', [LxAuthController::class, 'index'])->name('login');
    Route::post('custom-login', [LxAuthController::class, 'customLogin'])->name('login.custom');
    Route::get('registration', [LxAuthController::class, 'registration'])->name('register-user');
    Route::post('custom-registration', [LxAuthController::class, 'customRegistration'])->name('register.custom');

    Route::get('signout', [LxAuthController::class, 'signOut'])->name('signout');
});

/**
 * Enable CRUD of Category list
 */
Route::group(['prefix' => 'categorylist', 'middleware' => ['auth']], function() {

    Route::get('list', [CategoryController::class, 'index'])->name('list.categories');
    Route::get('list/category_id', [CategoryController::class, 'dbsubcategories'])->name('get.subcategories');


    Route::post('add-category', [CategoryController::class, 'storeCategory'])->name('adda.category');

    Route::post('add-subcategory', [SubCategoryController::class, 'storeSubCategory'])->name('adda.subcategory');

    Route::post('add-product', [ProductController::class, 'storeProduct'])->name('adda.product');
});
