<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlasticProductController;

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

// HOME PAGE
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// USER DASHBOARD
// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('user.home')->middleware('auth');

// ADMIN CONSOLE CMS DASHBOARD
Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin'); // 'is_admin' created in Middleware Kernal.php

// CONSOLE ADMINS CMS PAGES
Route::get('/admin/admins', [AdminController::class, 'list'])->name('admin.list')->middleware('is_admin');
Route::get('/admin/admins/add', [AdminController::class, 'addForm'])->name('admin.add')->middleware('is_admin');
Route::post('/admin/admins/add', [AdminController::class, 'add'])->middleware('is_admin');
Route::get('/admin/admins/edit/{user:id}', [AdminController::class, 'editForm'])->name('admin.edit')->where('user', '[0-9]+')->middleware('is_admin');
Route::post('/admin/admins/edit/{user:id}', [AdminController::class, 'edit'])->where('user', '[0-9]+')->middleware('is_admin');
Route::get('/admin/admins/delete/{user:id}', [AdminController::class, 'delete'])->where('user', '[0-9]+')->name('admin.delete')->middleware('is_admin');
Route::get('/admin/admins/image/{user:id}', [AdminController::class, 'imageForm'])->where('user', '[0-9]+')->name('admin.image')->middleware('is_admin');
Route::post('/admin/admins/image/{user:id}', [AdminController::class, 'image'])->where('user', '[0-9]+')->name('admin.image')->middleware('is_admin');

// CONSOLE USERS CMS PAGES
Route::get('/admin/users', [UserController::class, 'list'])->name('user.list')->middleware('is_admin');
Route::get('/admin/users/add', [UserController::class, 'addForm'])->name('user.add')->middleware('is_admin');
Route::post('/admin/users/add', [UserController::class, 'add'])->middleware('is_admin');
Route::get('/admin/users/edit/{user:id}', [UserController::class, 'editForm'])->name('user.edit')->where('user', '[0-9]+')->middleware('is_admin');
Route::post('/admin/users/edit/{user:id}', [UserController::class, 'edit'])->where('user', '[0-9]+')->middleware('is_admin');
Route::get('/admin/users/delete/{user:id}', [UserController::class, 'delete'])->where('user', '[0-9]+')->name('user.delete')->middleware('is_admin');
Route::get('/admin/users/image/{user:id}', [UserController::class, 'imageForm'])->where('user', '[0-9]+')->name('user.image')->middleware('is_admin');
Route::post('/admin/users/image/{user:id}', [UserController::class, 'image'])->where('user', '[0-9]+')->name('user.image')->middleware('is_admin');

// CONSOLE PLASTIC PRODUCTS CMS PAGES
Route::get('/admin/plastic_products', [PlasticProductController::class, 'list'])->name('plastic.list')->middleware('is_admin');
Route::get('/admin/plastic_products/add', [PlasticProductController::class, 'addForm'])->name('plastic.add')->middleware('is_admin');
Route::post('/admin/plastic_products/add', [PlasticProductController::class, 'add'])->middleware('is_admin');
Route::get('/admin/plastic_products/edit/{plastic_product:id}', [PlasticProductController::class, 'editForm'])->name('plastic.edit')->where('user', '[0-9]+')->middleware('is_admin');
Route::post('/admin/plastic_products/edit/{plastic_product:id}', [PlasticProductController::class, 'edit'])->where('plastic_product', '[0-9]+')->middleware('is_admin');
Route::get('/admin/plastic_products/delete/{plastic_product:id}', [PlasticProductController::class, 'delete'])->where('plastic_product', '[0-9]+')->name('plastic.delete')->middleware('is_admin');
Route::get('/admin/plastic_products/image/{plastic_product:id}', [PlasticProductController::class, 'imageForm'])->where('plastic_product', '[0-9]+')->name('plastic.image')->middleware('is_admin');
Route::post('/admin/plastic_products/image/{plastic_product:id}', [PlasticProductController::class, 'image'])->where('plastic_product', '[0-9]+')->name('plastic.image')->middleware('is_admin');
