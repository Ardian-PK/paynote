<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CicilanController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\IncomesController;

// Home Route
Route::view('/', 'home.index')->name('home');

// Auth Routes
Route::group(['middleware' => 'web'], function () {
    Route::get('/login', [Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [Auth\LoginController::class, 'login']);
    Route::get('/register', [Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [Auth\RegisterController::class, 'register']);
    Route::post('/logout', [Auth\LoginController::class, 'logout'])->name('logout');
});

// Kategori
Route::group(['middleware' => ['auth']], function () {
    Route::get('cicilan', [CicilanController::class, 'index'])->name('cicilan');
    Route::get('cicilan/add', [CicilanController::class, 'addPage'])->name('cicilan.addPage');
    Route::post('cicilan/insert', [CicilanController::class, 'insert'])->name('cicilan.insert');
    Route::get('cicilan/edit/{id}', [CicilanController::class, 'editPage'])->name('cicilan.editPage');
    Route::put('cicilan/update/{id}', [CicilanController::class, 'update'])->name('cicilan.update');
    Route::get('cicilan/delete/{id}', [CicilanController::class, 'delete'])->name('cicilan.delete');
});

// Incomes
Route::middleware(['auth'])->group(function () {
    Route::get('incomes', [IncomesController::class, 'index'])->name('incomes');
    Route::get('incomes/add', [IncomesController::class, 'addPage'])->name('incomes.addPage');
    Route::post('incomes/insert', [IncomesController::class, 'insert'])->name('incomes.insert');
    Route::get('incomes/edit/{id}', [IncomesController::class, 'editPage'])->name('incomes.editPage');
    Route::put('incomes/update/{id}', [IncomesController::class, 'update'])->name('incomes.update');
    Route::get('incomes/delete/{id}', [IncomesController::class, 'delete'])->name('incomes.delete');
});

// Expenses
Route::middleware(['auth'])->group(function () {
    Route::get('expenses', [ExpensesController::class, 'index'])->name('expenses');
    Route::get('expenses/add', [ExpensesController::class, 'addPage'])->name('expenses.addPage');
    Route::post('expenses/insert', [ExpensesController::class, 'insert'])->name('expenses.insert');
    Route::get('expenses/edit/{id}', [ExpensesController::class, 'editPage'])->name('expenses.editPage');
    Route::put('expenses/update/{id}', [ExpensesController::class, 'update'])->name('expenses.update');
    Route::get('expenses/delete/{id}', [ExpensesController::class, 'delete'])->name('expenses.delete');
});

// Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Auth Routes
Auth::routes();
