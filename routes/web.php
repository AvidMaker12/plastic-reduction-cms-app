<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlasticProductController;
use App\Http\Controllers\PlasticCalculatorQuestionController;
use App\Http\Controllers\PlasticCalculatorMultipleChoiceController;
use App\Http\Controllers\QuickCalculatorController;
use App\Http\Controllers\QuestionnaireController;

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
    return view('index');
});

Auth::routes();

// USER LOGIN DASHBOARD
Route::get('/home', [HomeController::class, 'index'])->name('user.home')->middleware('auth');

// ADMIN CONSOLE CMS DASHBOARD
Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin'); // 'is_admin' created in Middleware Kernal.php

// CONSOLE ADMINS CMS PAGES
Route::get('/admin/admins', [AdminController::class, 'list'])->name('admin.list')->middleware('is_admin');
Route::get('/admin/admins/add', [AdminController::class, 'addForm'])->name('admin.add')->middleware('is_admin');
Route::post('/admin/admins/add', [AdminController::class, 'add'])->middleware('is_admin');
Route::get('/admin/admins/edit/{user:id}', [AdminController::class, 'editForm'])->where('user', '[0-9]+')->name('admin.edit')->middleware('is_admin');
Route::post('/admin/admins/edit/{user:id}', [AdminController::class, 'edit'])->where('user', '[0-9]+')->middleware('is_admin');
Route::get('/admin/admins/delete/{user:id}', [AdminController::class, 'delete'])->where('user', '[0-9]+')->name('admin.delete')->middleware('is_admin');
Route::get('/admin/admins/image/{user:id}', [AdminController::class, 'imageForm'])->where('user', '[0-9]+')->name('admin.image')->middleware('is_admin');
Route::post('/admin/admins/image/{user:id}', [AdminController::class, 'image'])->where('user', '[0-9]+')->name('admin.image')->middleware('is_admin');

// CONSOLE USERS CMS PAGES
Route::get('/admin/users', [UserController::class, 'list'])->name('user.list')->middleware('is_admin');
Route::get('/admin/users/add', [UserController::class, 'addForm'])->name('user.add')->middleware('is_admin');
Route::post('/admin/users/add', [UserController::class, 'add'])->middleware('is_admin');
Route::get('/admin/users/edit/{user:id}', [UserController::class, 'editForm'])->where('user', '[0-9]+')->name('user.edit')->middleware('is_admin');
Route::post('/admin/users/edit/{user:id}', [UserController::class, 'edit'])->where('user', '[0-9]+')->middleware('is_admin');
Route::get('/admin/users/delete/{user:id}', [UserController::class, 'delete'])->where('user', '[0-9]+')->name('user.delete')->middleware('is_admin');
Route::get('/admin/users/image/{user:id}', [UserController::class, 'imageForm'])->where('user', '[0-9]+')->name('user.image')->middleware('is_admin');
Route::post('/admin/users/image/{user:id}', [UserController::class, 'image'])->where('user', '[0-9]+')->name('user.image')->middleware('is_admin');

// CONSOLE PLASTIC PRODUCTS CMS PAGES
Route::get('/admin/plastic_products', [PlasticProductController::class, 'list'])->name('plastic.list')->middleware('is_admin');
Route::get('/admin/plastic_products/add', [PlasticProductController::class, 'addForm'])->name('plastic.add')->middleware('is_admin');
Route::post('/admin/plastic_products/add', [PlasticProductController::class, 'add'])->middleware('is_admin');
Route::get('/admin/plastic_products/edit/{plastic_product:id}', [PlasticProductController::class, 'editForm'])->where('plastic_product', '[0-9]+')->name('plastic.edit')->middleware('is_admin');
Route::post('/admin/plastic_products/edit/{plastic_product:id}', [PlasticProductController::class, 'edit'])->where('plastic_product', '[0-9]+')->middleware('is_admin');
Route::get('/admin/plastic_products/delete/{plastic_product:id}', [PlasticProductController::class, 'delete'])->where('plastic_product', '[0-9]+')->name('plastic.delete')->middleware('is_admin');
Route::get('/admin/plastic_products/icon/{plastic_product:id}', [PlasticProductController::class, 'iconForm'])->where('plastic_product', '[0-9]+')->name('plastic.icon')->middleware('is_admin');
Route::post('/admin/plastic_products/icon/{plastic_product:id}', [PlasticProductController::class, 'icon'])->where('plastic_product', '[0-9]+')->name('plastic.icon')->middleware('is_admin');
Route::get('/admin/plastic_products/image/{plastic_product:id}', [PlasticProductController::class, 'imageForm'])->where('plastic_product', '[0-9]+')->name('plastic.image')->middleware('is_admin');
Route::post('/admin/plastic_products/image/{plastic_product:id}', [PlasticProductController::class, 'image'])->where('plastic_product', '[0-9]+')->name('plastic.image')->middleware('is_admin');

// CONSOLE PLASTIC CALCULATOR QUESTION & CHOICES CMS PAGES
Route::get('/admin/plastic_calculator_questions', [PlasticCalculatorQuestionController::class, 'list'])->name('plastic_calculator_question.list')->middleware('is_admin');
Route::get('/admin/plastic_calculator_questions/add', [PlasticCalculatorQuestionController::class, 'addForm'])->name('plastic_calculator_question.add')->middleware('is_admin');
Route::post('/admin/plastic_calculator_questions/add', [PlasticCalculatorQuestionController::class, 'add'])->middleware('is_admin');
Route::post('/admin/plastic_calculator_questions/add-choice/{plastic_calculator_question:id}', [PlasticCalculatorQuestionController::class, 'addChoice'])->where('plastic_calculator_question', '[0-9]+')->name('plastic_calculator_question.addChoice')->middleware('is_admin');
Route::get('/admin/plastic_calculator_questions/edit/{plastic_calculator_question:id}', [PlasticCalculatorQuestionController::class, 'editForm'])->where('plastic_calculator_question', '[0-9]+')->name('plastic_calculator_question.edit')->middleware('is_admin');
Route::post('/admin/plastic_calculator_questions/edit/{plastic_calculator_question:id}', [PlasticCalculatorQuestionController::class, 'edit'])->where('plastic_calculator_question', '[0-9]+')->middleware('is_admin');
Route::post('/admin/plastic_calculator_questions/edit-choice/{multiple_choice:id}', [PlasticCalculatorQuestionController::class, 'editChoice'])->where('plastic_calculator_question', '[0-9]+')->name('plastic_calculator_question.editChoice')->middleware('is_admin'); // Note: variable name inside get() curly-braces max. 32 characters.
Route::get('/admin/plastic_calculator_questions/delete/{plastic_calculator_question:id}', [PlasticCalculatorQuestionController::class, 'delete'])->where('plastic_calculator_question', '[0-9]+')->name('plastic_calculator_question.delete')->middleware('is_admin');
Route::get('/admin/plastic_calculator_questions/delete-choice/{multiple_choice:id}', [PlasticCalculatorQuestionController::class, 'deleteChoice'])->where('plastic_calculator_question', '[0-9]+')->name('plastic_calculator_question.deleteChoice')->middleware('is_admin'); // Note: variable inside get() curly-braces must match variable name used in controller function.
Route::get('/admin/plastic_calculator_questions/icon/{plastic_calculator_question:id}', [PlasticCalculatorQuestionController::class, 'iconForm'])->where('plastic_calculator_question', '[0-9]+')->name('plastic_calculator_question.icon')->middleware('is_admin');
Route::post('/admin/plastic_calculator_questions/icon/{plastic_calculator_question:id}', [PlasticCalculatorQuestionController::class, 'icon'])->where('plastic_calculator_question', '[0-9]+')->name('plastic_calculator_question.icon')->middleware('is_admin');
Route::post('/admin/plastic_calculator_questions/icon-choice/{plastic_calculator_question:id}', [PlasticCalculatorQuestionController::class, 'iconChoice'])->where('plastic_calculator_question', '[0-9]+')->name('plastic_calculator_question.iconChoice')->middleware('is_admin');
Route::get('/admin/plastic_calculator_questions/image/{plastic_calculator_question:id}', [PlasticCalculatorQuestionController::class, 'imageForm'])->where('plastic_calculator_question', '[0-9]+')->name('plastic_calculator_question.image')->middleware('is_admin');
Route::post('/admin/plastic_calculator_questions/image/{plastic_calculator_question:id}', [PlasticCalculatorQuestionController::class, 'image'])->where('plastic_calculator_question', '[0-9]+')->name('plastic_calculator_question.image')->middleware('is_admin');

// CONSOLE PLASTIC CALCULATOR MULTIPLE CHOICE CMS PAGES
Route::get('/admin/plastic_calculator_multiple_choices', [PlasticCalculatorMultipleChoiceController::class, 'list'])->name('plastic_calculator_multiple_choice.list')->middleware('is_admin');
// Route::get('/admin/plastic_calculator_multiple_choices/add', [PlasticCalculatorMultipleChoiceController::class, 'addForm'])->name('plastic_calculator_multiple_choice.add')->middleware('is_admin');
// Route::post('/admin/plastic_calculator_multiple_choices/add', [PlasticCalculatorMultipleChoiceController::class, 'add'])->middleware('is_admin');
// Route::get('/admin/plastic_calculator_multiple_choices/edit/{plastic_calculator_multiple_choice:id}', [PlasticCalculatorMultipleChoiceController::class, 'editForm'])->where('plastic_calculator_multiple_choice', '[0-9]+')->name('plastic_calculator_multiple_choice.edit')->middleware('is_admin');
// Route::post('/admin/plastic_calculator_multiple_choices/edit/{plastic_calculator_multiple_choice:id}', [PlasticCalculatorMultipleChoiceController::class, 'edit'])->where('plastic_calculator_multiple_choice', '[0-9]+')->middleware('is_admin');
// Route::get('/admin/plastic_calculator_multiple_choices/delete/{plastic_calculator_multiple_choice:id}', [PlasticCalculatorMultipleChoiceController::class, 'delete'])->where('plastic_calculator_multiple_choice', '[0-9]+')->name('plastic_calculator_multiple_choice.delete')->middleware('is_admin');
// Route::get('/admin/plastic_calculator_multiple_choices/icon/{plastic_calculator_multiple_choice:id}', [PlasticCalculatorMultipleChoiceController::class, 'iconForm'])->where('plastic_calculator_multiple_choice', '[0-9]+')->name('plastic_calculator_multiple_choice.icon')->middleware('is_admin');
// Route::post('/admin/plastic_calculator_multiple_choices/icon/{plastic_calculator_multiple_choice:id}', [PlasticCalculatorMultipleChoiceController::class, 'icon'])->where('plastic_calculator_multiple_choice', '[0-9]+')->name('plastic_calculator_multiple_choice.icon')->middleware('is_admin');
// Route::get('/admin/plastic_calculator_multiple_choices/image/{plastic_calculator_multiple_choice:id}', [PlasticCalculatorMultipleChoiceController::class, 'imageForm'])->where('plastic_calculator_multiple_choice', '[0-9]+')->name('plastic_calculator_multiple_choice.image')->middleware('is_admin');
// Route::post('/admin/plastic_calculator_multiple_choices/image/{plastic_calculator_multiple_choice:id}', [PlasticCalculatorMultipleChoiceController::class, 'image'])->where('plastic_calculator_multiple_choice', '[0-9]+')->name('plastic_calculator_multiple_choice.image')->middleware('is_admin');


// QUICK CALCULATOR
Route::get('/quick-calculator/page1', [QuickCalculatorController::class, 'quickQuestion1'])->name('quick_calculator.pg1');
Route::get('/quick-calculator/page2/{quick_choices:slug}', [QuickCalculatorController::class, 'quickQuestion2'])->where('quick_choices', '[A-z\-]+')->name('quick_calculator.pg2');
Route::get('/quick-calculator/results/{quick_choices:slug}', [QuickCalculatorController::class, 'quickResult'])->where('quick_choices', '[A-z\-]+')->name('quick_calculator.result');

// USER PLASTIC REDUCTION QUESTIONNAIRE
Route::get('/questionnaire/page1', [QuestionnaireController::class, 'Question1'])->name('questionnaire.pg1')->middleware('auth');
Route::get('/questionnaire/page2/{quick_choices:slug}', [QuestionnaireController::class, 'Question2'])->where('quick_choices', '[A-z\-]+')->name('questionnaire.pg2')->middleware('auth');
Route::get('/questionnaire/results/{quick_choices:slug}', [QuestionnaireController::class, 'Result'])->where('quick_choices', '[A-z\-]+')->name('questionnaire.result')->middleware('auth');
