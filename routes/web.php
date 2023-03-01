<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LxAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentReplyController;
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

// Route::get('/', function () {
    // return view('welcome');
// });

Route::get('/', [ProductController::class, 'index'])->name('all.products');
Route::get('product/{productId}', [ProductController::class, 'showProductDtail'])->name('product.detail');
Route::get('cart/addItem/{id}', [ProductController::class, 'addToCart'])->name('product.addToCart');

/**
 * Cart System
*/
Route::get('/cart', [CartController::class, 'getCart'])->name('checkout.cart');
Route::patch('cart/update/', [CartController::class, 'updateCart'])->name('cart.update'); // AJAX call
Route::delete('/cart/item/remove', [CartController::class, 'removeItem'])->name('checkout_cart.remove');
Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('checkout_cart.clear');

/**
 * Designing the Comment System.
*/
Route::group(['prefix' => 'comments', 'middleware' => ['auth']], function() {

    Route::post('store', [CommentController::class, 'storeComment'])->name('comment.store');
    Route::post('edit', [CommentController::class, 'editComment'])->name('comment.edit');
    Route::post('delete', [CommentController::class, 'destroyComment'])->name('comment.delete');

    Route::post('replies/store', [CommentReplyController::class, 'storeCommentReply'])->name('commentreply.store');

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
