<?php

use App\Http\Controllers\AdminController\CategoryController;
use App\Http\Controllers\AdminController\MainpageController;
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
Route::get('/admin-dashboard',[MainpageController::class,'mainPage']);
//for category
Route::get('create-category',[CategoryController::class,'CreateCategory']);
Route::post('store-category',[CategoryController::class,'StoreCategory'])->name('store.category');
Route::get('view-category',[CategoryController::class,'CategoryList'])->name('view.category');
Route::get('change-status',[CategoryController::class,'changeStatus']);
Route::get('edit-category/{id}',[CategoryController::class,'EditCategory']);
Route::post('update-category/{id}',[CategoryController::class,'UpdateCategory'])->name('update.category');
Route::get('delete-Category/{id}',[CategoryController::class,'Delete'])->name('delete.category');