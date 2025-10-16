<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware('isAdmin')->group(function () {


    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::view('/', 'dashboard.index')->name('index');
        Route::view('/course', 'dashboard.course')->name('course');
        Route::view('/addCategory', 'dashboard.addCategory')->name('category');

        // course-details
        Route::view('/course-details', 'dashboard.course-details')->name('course-details');

        Route::view('/students', 'dashboard.students')->name('students');
        Route::view('/teacher', 'dashboard.teacher')->name('teacher');
        Route::view('/library', 'dashboard.library')->name('library');
        Route::view('/department', 'dashboard.department')->name('department');
        Route::view('/staff', 'dashboard.staff')->name('staff');
        Route::view('/fees', 'dashboard.fees')->name('fees');

        // Pages
        Route::view('/login', 'dashboard.login')->name('login');
        Route::view('/signup', 'dashboard.signup')->name('signup');
        Route::view('/forgot-password', 'dashboard.forgot-password')->name('forgot');
        Route::view('/404', 'dashboard.404')->name('404');
        Route::view('/500', 'dashboard.500')->name('500');

        // Tables
        Route::view('/table-bootstrap', 'dashboard.table-bootstrap')->name('tableBootstrap');
        Route::view('/data-table', 'dashboard.data-table')->name('dataTable');

        // Components
        Route::view('/form', 'dashboard.form')->name('form');
    });
});



Route::middleware('isAdmin')->group(function () {
    // display products
    Route::get('/adminProducts', [ProductController::class, 'getProducts'])->name('admin.getProducts');
    // create product
    Route::get('/createProduct', [ProductController::class, 'createProduct'])->name('admin.createProduct');
    // store product
    Route::post('/storeProduct', [ProductController::class, 'storeProduct'])->name('admin.storeProduct');
    // ===========================categories==========================
    // display categories
    Route::get('/categories', [CategoryController::class, 'getCategories'])->name('admin.getCategories');
    // create category
    Route::get('/createCategory', [CategoryController::class, 'createCategory'])->name('admin.createCategory');
    // store category
    Route::post('/storeCategory', [CategoryController::class, 'storeCategory'])->name('admin.storeCategory');

    // ===========================Delete==========================
    Route::delete('/deleteProduct/{id}', [ProductController::class, 'deleteProduct'])->name('admin.deleteProduct');
    Route::delete('/deleteCategory/{id}', [CategoryController::class, 'deleteCategory'])->name('admin.deleteCategory');
    // ====================Update==========================
    Route::get('/editProduct/{id}', [ProductController::class, 'editProduct'])->name('admin.editProduct');
    Route::put('/updateProduct/{id}', [ProductController::class, 'updateProduct'])->name('admin.updateProduct');
    Route::get('/editCategory/{id}', [CategoryController::class, 'editCategory'])->name('admin.editCategory');
    Route::put('/updateCategory/{id}', [CategoryController::class, 'updateCategory'])->name('admin.updateCategory');
});
