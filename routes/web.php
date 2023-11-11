<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\recipeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SingleController;
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
// main pages
Route::get('/', [HomeController::class, 'index']);
Route::get('/single/{id}', [HomeController::class, 'singlepost']);
Route::get('/category/{id}', [recipeController::class, 'foodcategory']);

// new user
Route::get('/login', [LoginController::class, 'login']);
Route::get('/signup', [LoginController::class, 'signup']);

// new recipe
Route::get('/suggestrecipe', [recipeController::class, 'suggestrecipe']);
Route::get('/admin/newrecipe', [recipeController::class, 'newrecipe']);
Route::get('/admin/newcategory', [recipeController::class, 'newCategory']);

// admin panel
Route::get('/admin/recipedata', [recipeController::class, 'recipedata']);
Route::get('/admin/userdata', [LoginController::class, 'userdata']);
Route::get('/admin/categorydata', [recipeController::class, 'categorydata']);
Route::get('/admin/approvaldata', [recipeController::class, 'approvaldata']);

// edit data
Route::get('/admin/editrecipe/{id}', [recipeController::class, 'editrecipe']);
Route::get('/admin/edituser/{id}', [LoginController::class, 'edituser']);

// delete data
Route::get('/admin/deleterecipe/{id}', [recipeController::class, 'deleterecipe']);
Route::get('/admin/deleteapproval/{id}', [recipeController::class, 'deleteapproval']);
Route::get('/admin/deletecategory/{id}', [recipeController::class, 'deletecategory']);
Route::get('/admin/deleteuser/{id}', [LoginController::class, 'deleteuser']);

// approval data
Route::get('/admin/approve/{id}', [recipeController::class, 'approve']);
Route::get('/admin/disapprove/{id}', [recipeController::class, 'disapprove']);

// searches
Route::get('/admin/searchrecipe', [recipeController::class, 'searchrecipe']);
Route::get('/admin/searchapproval', [recipeController::class, 'searchapproval']);
Route::get('/admin/searchcategory', [recipeController::class, 'searchcategory']);
Route::get('/admin/searchuser', [LoginController::class, 'searchuser']);
Route::get('/search', [HomeController::class, 'search']);

// session edit
Route::get('/getsession', [SessionController::class, 'getsession']);
Route::get('/setsession', [SessionController::class, 'setsession']);
Route::get('/destroysession', [SessionController::class, 'destroysession']);


// post routes
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/register', [LoginController::class, 'register']);
Route::post('/waitforapproval', [recipeController::class, 'storeForApproval']);
Route::post('/storerecipe', [recipeController::class, 'store']);
Route::post('/storecategory', [recipeController::class, 'storecategory']);
Route::post('/admin/updaterecipe', [recipeController::class, 'updaterecipe']);
Route::post('/admin/updateuser', [LoginController::class, 'updateuser']);

