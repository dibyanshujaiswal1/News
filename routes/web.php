<?php

use App\Http\Controllers\AdminController\BannerController;
use App\Http\Controllers\AdminController\CategoryController;
use App\Http\Controllers\AdminController\LogoController;
use App\Http\Controllers\AdminController\MainpageController;
use App\Http\Controllers\AdminController\SubCategoryController;
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


Route::get('/admin-dashboard',[MainpageController::class,'mainPage']);
Route::prefix('/admin')->group(function () {
//for category
Route::get('/create-category',[CategoryController::class,'CreateCategory']);
Route::post('store-category',[CategoryController::class,'StoreCategory'])->name('store.category');
Route::get('/view-category',[CategoryController::class,'CategoryList'])->name('view.category');
Route::get('/change-status',[CategoryController::class,'changeStatus']);
Route::get('/edit-category/{id}',[CategoryController::class,'EditCategory']);
Route::post('update-category/{id}',[CategoryController::class,'UpdateCategory'])->name('update.category');
Route::get('delete-Category/{id}',[CategoryController::class,'Delete'])->name('delete.category');
//for subcategory
Route::get('/add-subcategory',[SubCategoryController::class,'AddSubCategory']);
Route::post('store-subcategory',[SubCategoryController::class,'StoreSubCategory'])->name('store.subcategory');
Route::get('/view-subcategory',[SubCategoryController::class,'SubCategoryList'])->name('view.subcategory');
Route::get('/edit-subcategory/{id}',[SubCategoryController::class,'EditSubCategory']);
Route::post('update-subcategory/{id}',[SubCategoryController::class,'UpdateSubCategory'])->name('update.Subcategory');
Route::get('delete-subCategory/{id}',[SubCategoryController::class,'Delete'])->name('delete.subcategory');
Route::get('/changestatus',[SubCategoryController::class,'changeSubCategoryStatus']);
//for logo
Route::get('/add-logo',[LogoController::class,'CreateLogo']);
Route::post('store-logo',[LogoController::class,'StoreLogo'])->name('store.logo');
Route::get('/view-logo',[LogoController::class,'ViewLogo'])->name('view.logo');
Route::get('/edit-logo/{id}',[LogoController::class,'EditLogo']);
Route::post('Update-logo/{id}',[LogoController::class,'UpdateLogo'])->name('update.logo');
Route::get('delete-logo/{id}',[LogoController::class,'DeleteLogo'])->name('delete.logo');
//for banner
Route::get('/add-banner',[BannerController::class,'CreateBanner']);
Route::post('store-banner',[BannerController::class,'StoreBanner'])->name('store.banner');
Route::get('/view-banner',[BannerController::class,'ViewBanner'])->name('view.banner');
Route::get('/edit-banner/{id}',[BannerController::class,'EditBanner']);
Route::post('update-banner/{id}',[BannerController::class,'UpdateBanner'])->name('update.banner');
Route::get('delete-banner/{id}',[BannerController::class,'DeleteBanner'])->name('delete.banner');


});