<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\QuzController;
use App\Http\Controllers\UserTestController;

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

// Quiz/Test routes for users
Route::prefix('quiz')->name('quiz.')->group(function () {
    Route::get('/start', [UserTestController::class, 'showTestForm'])->name('start');
    Route::post('/register', [UserTestController::class, 'registerAndStartTest'])->name('register');
    Route::get('/take', [UserTestController::class, 'takeQuiz'])->name('take');
    Route::post('/submit', [UserTestController::class, 'submitQuiz'])->name('submit');
    Route::get('/results/{test_id}', [UserTestController::class, 'showResults'])->name('results');
    Route::get('/api/questions/{category_id}', [UserTestController::class, 'getQuestionsByCategory'])->name('api.questions');
});

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
        
        // User History
        Route::get('/user-history', [AdminController::class, 'showUserHistory'])->name('user-history');
        Route::post('/api/user-history', [AdminController::class, 'getUserHistory'])->name('api.user-history');
        
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
            Route::get('/tests/{test}', [TestController::class, 'show'])->name('tests.show');
            Route::post('/tests', [TestController::class, 'store'])->name('tests.store');
            Route::put('/tests/{test}', [TestController::class, 'update'])->name('tests.update');
            Route::delete('/tests/{test}', [TestController::class, 'destroy'])->name('tests.destroy');
            
            // Questions (Quz)
            Route::get('/questions', [QuzController::class, 'index'])->name('questions.index');
            Route::post('/questions', [QuzController::class, 'store'])->name('questions.store');
            Route::get('/questions/{quz}', [QuzController::class, 'show'])->name('questions.show');
            Route::put('/questions/{quz}', [QuzController::class, 'update'])->name('questions.update');
            Route::delete('/questions/{quz}', [QuzController::class, 'destroy'])->name('questions.destroy');
            Route::delete('/questions/{quz}/image', [QuzController::class, 'removeImage'])->name('questions.delete_image');
            Route::get('/categories/{category}/questions', [QuzController::class, 'getByCategory'])->name('questions.by_category');
            
            // Users (for dropdowns)
            Route::get('/users', [AdminController::class, 'ajaxUsers'])->name('users.index');
            
            // User Management (Super Admin only)
            Route::get('/users/all', [AdminController::class, 'getAllUsers'])->name('users.all');
            Route::post('/users', [AdminController::class, 'createUser'])->name('users.create');
            Route::put('/users/{user}/role', [AdminController::class, 'updateUserRole'])->name('users.update_role');
            Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');
        });
    });
});
