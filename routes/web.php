<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;

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



// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('admin',[AdminController::class, 'index']);
Route::post('admin/auth',[AdminController::class, 'auth'])->name('admin.auth');


Route::group(['middleware'=>'admin_auth'], function (){

    //Dashboard section part
    Route::get('admin/dashboard',[AdminController::class, 'dashboard']);

    //Category section part 
    Route::get('admin/category',[CategoryController::class, 'index']);
    Route::get('admin/category/manage_category',[CategoryController::class, 'manage_category']);
    Route::get('admin/category/manage_category/{id}',[CategoryController::class, 'manage_category']);
    Route::post('admin/category/manage_category_process',[CategoryController::class, 'manage_category_process'])->name('category.insert');
    Route::get('admin/category/delete/{id}',[CategoryController::class, 'delete']);

    //Logout section part
    Route::get('admin/logout',function(){
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error','Logout Successfully');
        return redirect('admin');
    });

    //Coupon section part
    Route::get('admin/coupon',[CouponController::class, 'index']);
    Route::get('admin/coupon/manage_coupon',[CouponController::class, 'manage_coupon']);
    Route::post('admin/coupon/manage_coupon_process',[CouponController::class, 'manage_coupon_process'])->name('coupon.insert');
    Route::get('admin/coupon/delete/{id}',[CouponController::class, 'delete']);
    Route::get('admin/coupon/manage_category/{id}',[CouponController::class, 'manage_coupon']);

    


    //Route::get('admin/updatepassword',[AdminController::class, 'updatePassword']);
});

