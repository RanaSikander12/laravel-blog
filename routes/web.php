<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\ResetPassword;


Route::get('/' , [HomeController::Class , 'index'])->name('home.index');
Route::get('/post/read-blog/{id}' , [HomeController::Class , 'read'])->name('read-blog');


// auth controllers
Route::get('/login' , [LoginController::Class , 'index'])->name('login.index');
Route::post('/login/auth' , [LoginController::Class , 'check'])->name('login.check');
Route::get('/register' , [RegisterController::Class , 'index'])->name('register.index');
Route::post('/register/save' , [RegisterController::Class , 'save'])->name('register.save');


// dashboard controller
Route::get('/dashboard' , [DashboardController::Class , 'index'])->name('dashboard.index');
Route::get('/dashboard/post/add' , [DashboardController::Class , 'add'])->name('dashboard.post.add');
Route::post('/dashboard/post/save' , [DashboardController::Class , 'save'])->name('dashboard.post.save');
Route::get('/dashboard/post/edit/{id}' , [DashboardController::Class , 'edit'])->name('dashboard.post.edit');
Route::post('/dashboard/post/update/{id}' , [DashboardController::Class , 'update'])->name('dashboard.post.update');
Route::get('/dashboard/post/delete/{id}' , [DashboardController::Class , 'delete'])->name('dashboard.post.delete');







Route::get('/user/logout' , [DashboardController::Class , 'logoutUser'])->name('dashboard.logout');