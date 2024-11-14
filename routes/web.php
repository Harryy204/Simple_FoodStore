<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\Clients\OrderController;
use App\Http\Controllers\Clients\UserController;
use App\Http\Controllers\Clients\AboutsController;

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminProductController;



use Illuminate\Routing\Router;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[HomeController::class,"index"])->name('trangchu');
Route::get('/search',[HomeController::class,"search"])->name('search');
Route::get('theohang/{hang_id?}', [HomeController::class,"theohang"])->name('theohang');
// Route::get('theogia/{from?}/{to?}', [HomeController::class,"theogia"])->name('theogia');


Route::get('login', [UserController::class,"login"])->name('client.login');
Route::post('login', [UserController::class,"postlogin"])->name('postlogin');
// Route::get('dangky',[UserController::class,'dangky'])->name('dangky');
// Route::post('dangky',[UserController::class,'postdangky'])->name('postdangky');
Route::get('register', [UserController::class,"register"])->name('register');
Route::post('register', [UserController::class,"postregister"])->name('postregister');
Route::get('dangxuat',[UserController::class,"logout"] )->name('dangxuat');
Route::get('thong-tin',[UserController::class,"information"] )->name('thongTinUser');
Route::get('sua-thong-tin',[UserController::class,"update"] )->name('updateTT');
Route::post('sua-thong-tin',[UserController::class,"postUpdate"] )->name('postUpdate');
Route::get('product/{id}', [HomeController::class,"ShowProduct"])->name('showpro');
// route trang giao diện
Route::get('gioithieu', [UserController::class,"about"])->name('gioithieu');
Route::get('lienhe', [UserController::class,"contact"])->name('lienhe');
Route::get('tintuc', [UserController::class,"blog"])->name('tintuc');

// route giỏ hàng
Route::get('/giohang',[CartController::class,'index'])->name('client.giohang');
Route::get('/themgiohang/{id}/{sl}', [CartController::class,"themgiohang"])->name('themgiohang');
Route::get('/update/{action}/{id}', [CartController::class,"update"])->name('update');
Route::get('/deleteItem/{id}', [CartController::class,"deleteItemInCart"])->name('deleteItem');
Route::middleware(['clientlogin'])->group(function () {
    Route::get('xemdonhang', [OrderController::class,"index"])->name('xemdonhang');
    Route::get('dathang', [OrderController::class,"dathang"])->name('dathang');
    Route::post('dathang', [OrderController::class,"postdathang"])->name('postdathang');
    Route::get('chitietdh/{id}', [OrderController::class,"chitiet"])->name('chitietdh');
    Route::get('suadonhang/{id}', [OrderController::class,"sua"])->name('suadonhang');
    Route::post('suadonhang/{id}', [OrderController::class,"postsua"])->name('postsua');
    Route::get('huydonhang/{id}', [OrderController::class,"huy"])->name('huydonhang');
    Route::get('danhandonhang/{id}', [OrderController::class,"danhan"])->name('danhandonhang');
});



// router admin
Route::get('admin/login', [AdminHomeController::class, 'login'])->name('Admin.login');
Route::post('admin/login', [AdminHomeController::class, 'postlogin'])->name('Admin.postlogin');
Route::get('admin/logout', [AdminHomeController::class, 'logout'])->name('Admin.logout');
// categories
Route::middleware(['adminLogin'])->prefix('admin/')->group(function(){
    Route::get('home', [AdminHomeController::class, 'index'])->name('home.index');
    Route::get('category', [AdminCategoryController::class,"index"])->name('category.index');

    Route::get('category/add', [AdminCategoryController::class,"add"])->name('category.add');
    Route::post('category/create', [AdminCategoryController::class,"postcreate"])->name('category.create');
    Route::get('category/edit/{id}', [AdminCategoryController::class,"edit"])->name('category.edit'); 
    Route::post('category/edit/{id}', [AdminCategoryController::class,"postedit"])->name('category.postedit');
    Route::get('category/delete/{id}',[AdminCategoryController::class,'delete'])->name('category.delete');

    Route::get('category/addprice', [AdminCategoryController::class, 'addprice'])->name('category.addprice');
    Route::post('category/postprice', [AdminCategoryController::class, 'postprice'])->name('category.postprice');
    Route::get('category/editprice/{id}', [AdminCategoryController::class, 'editprice'])->name('category.editprice');
    Route::post('category/posteditprice/{id}', [AdminCategoryController::class,"posteditprice"])->name('category.posteditprice');
    Route::get('category/deleteprice/{id}',[AdminCategoryController::class,'deleteprice'])->name('category.deleteprice');

    Route::get('product', [AdminProductController::class,"index"])->name('product.index');
    Route::get('create', [AdminProductController::class,"create"])->name('product.create');
    Route::post('postcreate', [AdminProductController::class, "postcreate"])->name('product.postcreate');

    Route::get('product/edit/{id}',[AdminProductController::class, "edit"])->name('product.edit');
    Route::post('product/postedit/{id}',[AdminProductController::class, "postedit"])->name('product.postedit');

    Route::get('product/delete/{id}', [AdminProductController::class, "delete"])->name('product.delete');

    Route::get('user', [AdminUserController::class,"index"])->name('user.index');
    Route::get('user/create', [AdminUserController::class, "create"])->name('user.create');
    Route::post('user/postcreate', [AdminUserController::class, "postcreate"])->name('user.postcreate');

    Route::get('user/edit/{id}', [AdminUserController::class,"edit"])->name('user.edit');
    Route::post('user/postedit/{id}', [AdminUserController::class, "postedit"])->name('user.postedit');

    Route::get('user/delete/{id}', [AdminUserController::class, 'delete'])->name('user.delete');
    Route::get('order', [AdminOrderController::class,"index"])->name('order.index');
    Route::get('order/edit/{code}', [AdminOrderController::class,"edit"])->name('order.edit');
    Route::post('order/postedit/{code}', [AdminOrderController::class,"postedit"])->name('order.postedit');
    Route::get('order/delete/{code}', [AdminOrderController::class, 'delete'])->name('order.delete');
    Route::get('detailorder/{code}', [AdminOrderController::class,"detail"])->name('order.detail');
    Route::get('xacnhandonhang/{code}', [AdminOrderController::class,"xacnhandon"])->name('order.xacnhandonhang');
});

