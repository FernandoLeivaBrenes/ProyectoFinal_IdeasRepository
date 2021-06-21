<?php

use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    
    Route::get('/tutorial', function (){
        return view('welcome');
    })->name('tutorial');

    Route::get('/dashboard', function(){
        return view('projects');
    })->name('dashboard');
});

Route::prefix('admin')->middleware(['auth:sanctum', 'verified', 'team.admin'])->group(function () {

    Route::get('/users', function () {
        return view('user.admin_dashboard');
    })->name('admin_dashboard');

    Route::get('/users/create', function () {
        return view('user.CreateUser');
    })->name('admin_createView');

    Route::post('/users/create', [ UserController::class, 'store' ])->name('admin_create');

    Route::get('/users/edit/{id}', [ UserController::class, 'getUser' ])->name('admin_EditUser');

    Route::post('/users/edit', [ UserController::class, 'edit' ])->name('admin_edit');
});