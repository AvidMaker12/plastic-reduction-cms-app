<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('console.dashboard')->middleware('is_admin'); // 'is_admin' created in Middleware Kernal.php


// CONSOLE ADMINS CMS PAGES
Route::get('/admin/admins', [AdminController::class, 'list'])->name('admin.list')->middleware('is_admin');
Route::get('/admin/admins/add', [AdminController::class, 'addForm'])->name('admin.add')->middleware('is_admin');
Route::post('/admin/admins/add', [AdminController::class, 'add'])->middleware('is_admin');
Route::get('/admin/admins/edit/{user:id}', [AdminController::class, 'editForm'])->name('admin.edit')->where('user', '[0-9]+')->middleware('is_admin');
Route::post('/admin/admins/edit/{user:id}', [AdminController::class, 'edit'])->where('user', '[0-9]+')->middleware('is_admin');
Route::get('/admin/admins/delete/{user:id}', [AdminController::class, 'delete'])->where('user', '[0-9]+')->name('admin.delete')->middleware('is_admin');
Route::get('/admin/admins/image/{user:id}', [AdminController::class, 'imageForm'])->where('user', '[0-9]+')->name('admin.image')->middleware('is_admin');
Route::post('/admin/admins/image/user:id}', [AdminController::class, 'image'])->where('user', '[0-9]+')->name('admin.image')->middleware('is_admin');
