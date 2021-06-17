<?php

use Illuminate\Http\Request;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('admin')->middleware(['auth:sanctum', 'verified', 'team.admin'])->group(function () {
    Route::get('/users', function () {
        return view('user.admin_dashboard');
    })->name('admin_dashboard');

    Route::get('/users/{id?}', function ($id) {
        return view('user.admin_dashboard', ['user_id'=> $id]);
    })->name('admin_showUser');
});