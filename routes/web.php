<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DebtsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SuggestionController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
    return redirect('/dashboard');
});

Route::get('/registrar', [RegisterController::class, 'create']);
Route::post('/registrar', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::post('/profile/reset-password', [ProfileController::class, 'resetPassword'])->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/debts/create', [DebtsController::class, 'create'])->middleware('auth');
Route::post('/debts/create', [DebtsController::class, 'store'])->middleware('auth');
Route::post('/debts/edit/{id}', [DebtsController::class, 'edit'])->middleware('auth');
Route::delete('/debts/delete/{id}', [DebtsController::class, 'delete'])->middleware('auth');

Route::get('/suggestion', [SuggestionController::class, 'index'])->middleware('auth');
Route::get('/suggestion/create', [SuggestionController::class, 'create'])->middleware('auth');
Route::post('/suggestion/create', [SuggestionController::class, 'store'])->middleware('auth');
Route::delete('/suggestion/delete/{id}', [SuggestionController::class, 'delete'])->middleware('auth');

Route::get('/forgot-password', [ResetPasswordController::class, 'index'])->middleware(['guest'])->name('password.request');
Route::post('/forgot-password', [ResetPasswordController::class, 'send'])->middleware(['guest'])->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'reset'])->middleware(['guest'])->name('password.reset');
Route::post('/reset-password/{token}', [ResetPasswordController::class, 'store'])->middleware(['guest'])->name('password.update');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
