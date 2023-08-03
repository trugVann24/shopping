<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
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
    return view('auth.login');
});

// LOGIN- REGISTER- LOGOUT
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registing'])->name('registing');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'logining'])->name('logining');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN

Route::group(['middleware' => ['web', 'admin']], function () {
    Route::get('/', [AuthController::class, 'admin'])->name('admin');

    // CATEGORY
    Route::prefix('/category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::post('/add', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/edit', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    //SUB CATEGORY
    Route::prefix('/subcategory')->group(function () {
        Route::get('/', [SubCategoryController::class, 'index'])->name('subcategory.index');
        Route::post('/add', [SubCategoryController::class, 'store'])->name('subcategory.store');
        Route::get('/edit/{subcategory}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
        Route::put('/edit', [SubCategoryController::class, 'update'])->name('subcategory.update');
        Route::delete('/destroy/{subcategory}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');
    });

    //PRODUCTS
    Route::prefix('/product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::post('/add', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/edit/{product}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    });
});

// CLIENT
Route::group(['middleware' => ['web', 'client']], function () {
    Route::get('/', [ClientController::class, 'loadData'])->name('home');
    Route::prefix('/home')->group(function () {
        Route::get('/', [ClientController::class, 'loadData']);
        Route::get('/product-details/{product}', [ClientController::class, 'loadProductDetail'])->name('productDetails.load');
    });
});
