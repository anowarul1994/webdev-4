<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\VendorController;

use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
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



Route::get('/', [FrontendController::class, 'index']);

//vendor controller
Route::get('/vendor/registration', [VendorController::class, 'vendorRegistration']);
Route::get('/vendor/login/form', [VendorController::class, 'vendorLoginform']);
Route::post('/vendor/login', [VendorController::class, 'vendorlogin']);
Route::post('/vendor/store', [VendorController::class, 'vendorStore']);


//suplierController
Route::get('/vendor/manage', [SupplierController::class, 'vendorManage']);
Route::get('/vendor/edit/{id}', [SupplierController::class, 'vendorEdit']);
Route::post('/vendor/update/{id}', [SupplierController::class, 'vendorUpdate']);
Route::get('/vendor/delete/{id}', [SupplierController::class, 'vendorDelete']);
Route::get('/vendor/show/{id}', [SupplierController::class, 'vendorShow']);
Route::get('/vendor/products', [SupplierController::class, 'vendorProducts']);
Route::get('/vendor/aprroved/{id}', [SupplierController::class, 'vendorApproved']);
Route::get('/vendor/pending/{id}', [SupplierController::class, 'vendorPending']);


//vendor controller for product
Route::get('/vendor/dashboard', [VendorController::class, 'vendorDashboard']);
Route::get('/vendor/product/create/form', [VendorController::class, 'vendorProductCreateform']);
Route::post('vendor/product/store', [VendorController::class, 'vendorProductstore']);

//admin controller
Route::get('/admin/login', [AdminController::class, 'adminLoginForm']);
Route::post('/admin/login', [AdminController::class, 'adminLogin']);
Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);
Route::get('/admin/logout', [AdminController::class, 'adminLogout']);


//category controller

Route::get('/category/create', [CategoryController::class, 'categoryCreate']);
Route::post('/category/store', [CategoryController::class, 'categoryStore']);
Route::get('/category/manage', [CategoryController::class, 'categoryManage']);
Route::get('/category/delete/{id}', [CategoryController::class, 'categoryDelete']);
Route::get('/category/edit/{id}', [CategoryController::class, 'categoryEdit']);
Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate']);


//subcategory controller

Route::get('/subcategory/create', [SubcategoryController::class,'subcategoryCreate']);
Route::get('/subcategory/mange', [SubcategoryController::class,'subcategoryMange']);
Route::post('/subcategory/store', [SubcategoryController::class,'subcategoryStore']);
Route::post('/subcategory/update/{id}', [SubcategoryController::class,'subcategoryUpdate']);
Route::get('/subcategory/delete/{id}', [SubcategoryController::class,'subcategoryDelete']);
Route::get('/subcategory/edit/{id}', [SubcategoryController::class,'subcategoryEdit']);


//brand controller
Route::get('/brand/create', [BrandController::class,'brandCreate']);
Route::get('/brand/mange', [BrandController::class,'brandMange']);
Route::post('/brand/store', [BrandController::class,'brandStore']);
Route::post('/brand/update/{id}', [BrandController::class,'brandUpdate']);
Route::get('/brand/delete/{id}', [BrandController::class,'brandDelete']);
Route::get('/brand/edit/{id}', [BrandController::class,'brandEdit']);


//color controller
Route::get('/color/create', [ColorController::class,'colorCreate']);
Route::get('/color/mange', [ColorController::class,'colorMange']);
Route::post('/color/store', [ColorController::class,'colorStore']);
Route::post('/color/update/{id}', [ColorController::class,'colorUpdate']);
Route::get('/color/delete/{id}', [ColorController::class,'colorDelete']);
Route::get('/color/edit/{id}', [ColorController::class,'colorEdit']);


//size controller
Route::get('/size/create', [SizeController::class,'sizeCreate']);
Route::get('/size/mange', [SizeController::class,'sizeMange']);
Route::post('/size/store', [SizeController::class,'sizeStore']);
Route::post('/size/update/{id}', [SizeController::class,'sizeUpdate']);
Route::get('/size/delete/{id}', [SizeController::class,'sizeDelete']);
Route::get('/size/edit/{id}', [SizeController::class,'sizeEdit']);