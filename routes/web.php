<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProcessController::class, 'index'])->name('home');
Route::get('/process/{process}/categories', [ProcessController::class, 'show'])->name('process.categories');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Login routes (accessible to guests)
    Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.submit');
    
    // Protected admin routes
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/enhanced-dashboard', [AdminController::class, 'dashboard'])->name('enhanced-dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        
        // AJAX API routes for CRUD operations
        Route::prefix('api')->name('api.')->group(function () {
            // Processes
            Route::get('/processes', [ProcessController::class, 'ajaxIndex'])->name('processes.index');
            Route::post('/processes', [ProcessController::class, 'store'])->name('processes.store');
            Route::put('/processes/{process}', [ProcessController::class, 'update'])->name('processes.update');
            Route::delete('/processes/{process}', [ProcessController::class, 'destroy'])->name('processes.destroy');
            
            // Categories
            Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
            Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');
            Route::put('/categories/{categories}', [CategoriesController::class, 'update'])->name('categories.update');
            Route::delete('/categories/{categories}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
            
            // Formateurs
            Route::get('/formateurs', [FormateurController::class, 'index'])->name('formateurs.index');
            Route::post('/formateurs', [FormateurController::class, 'store'])->name('formateurs.store');
            Route::put('/formateurs/{formateur}', [FormateurController::class, 'update'])->name('formateurs.update');
            Route::delete('/formateurs/{formateur}', [FormateurController::class, 'destroy'])->name('formateurs.destroy');
            
            // Tests
            Route::get('/tests', [TestController::class, 'index'])->name('tests.index');
            Route::post('/tests', [TestController::class, 'store'])->name('tests.store');
            Route::put('/tests/{test}', [TestController::class, 'update'])->name('tests.update');
            Route::delete('/tests/{test}', [TestController::class, 'destroy'])->name('tests.destroy');
            
            // Users (for dropdowns)
            Route::get('/users', [AdminController::class, 'ajaxUsers'])->name('users.index');
        });
    });
});
