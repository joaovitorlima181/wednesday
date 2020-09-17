<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DebtsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Debt;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function(){
    return redirect('/dashboard');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'login']);

Route::get('/registrar', [RegisterController::class, 'create']);
Route::post('/registrar', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/debts/create', [DebtsController::class, 'create']);
Route::post('/debts/create', [DebtsController::class, 'store']);
Route::delete('/debts/delete/{id}', [DebtsController::class, 'delete']);
Route::post('/debts/edit/{id}', [DebtsController:: class, 'edit']);

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});