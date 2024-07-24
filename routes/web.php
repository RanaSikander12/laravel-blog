<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\DashboardController;


Route::get('/' , [HomeController::Class , 'index'])->name('home.index');

Route::get('/login' , [LoginController::Class , 'index'])->name('login.index');
Route::post('/login/auth' , [LoginController::Class , 'check'])->name('login.check');
Route::get('/register' , [RegisterController::Class , 'index'])->name('register.index');
Route::post('/register/save' , [RegisterController::Class , 'save'])->name('register.save');

Route::get('/dashboard' , [DashboardController::Class , 'index'])->name('dashboard.index');