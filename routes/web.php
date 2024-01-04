<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliveryBoyController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\FrontendController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/backend', function () {
//     return view('Backend.Home.index');
// });

// -------------------------frontend routes start--------------------

Route::get('/', [FrontendController::class, 'index'])->name('homepage');
Route::get('/category/dish/show/all', [FrontendController::class, 'all_dish'])->name('all_dish');
Route::get('/category/{id}', [FrontendController::class, 'show_dish'])->name('category_dish');


// cart
Route::post('/cart/add', [CartController::class, 'insert'])->name('add_to_cart');
Route::get('/cart/show', [CartController::class, 'show'])->name('cart_show');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('remove_item');
Route::post('/cart/update', [CartController::class, 'update'])->name('update_item');

Route::group(['middleware' => 'user-auth'], function () {
    Route::get('/cart/checkout', [CheckoutController::class, 'check'])->name('checkout_page');
    Route::get('/registration', [CustomerController::class, 'registrationPage'])->name('user_registration');
    Route::post('/registration/complete', [CustomerController::class, 'registrationComplete'])->name('complete_registration');
});

// -------------------------frontend routes end--------------------




// -----------------backend routes----------------

Route::get('/signin', [UserController::class, 'showLogin'])->name('show.loginPage');
Route::post('/registration/create', [UserController::class, 'registration'])->name('registration');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin-auth'], function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // category start
        Route::get('/category/add', [CategoryController::class, 'index'])->name('show_cate_table');
        Route::post('/category/save', [CategoryController::class, 'save'])->name('cate_save');
        Route::get('/category/manage', [CategoryController::class, 'manage'])->name('manage_cate');
        Route::get('/category/active/{id}', [CategoryController::class, 'active'])->name('active_cate');
        Route::get('/category/inactive/{id}', [CategoryController::class, 'inactive'])->name('inactive_cate');
        Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('cate_delete');
        Route::post('/category/update', [CategoryController::class, 'update'])->name('cate_update');

        // category end


        // delivery boy start
        Route::get('/delivery-boy/add', [DeliveryBoyController::class, 'index'])->name('show_add_delivery_boy');
        Route::post('/delivery-boy/save', [DeliveryBoyController::class, 'save'])->name('delivery_boy_save');
        Route::get('/delivery-boy/manage', [DeliveryBoyController::class, 'manage'])->name('delivery_boy_manage');
        Route::get('/delivery-boy/{id}/{status}', [DeliveryBoyController::class, 'status_update'])->name('delivery_boy_status');
        Route::get('/delivery-boy/delete/{id}', [DeliveryBoyController::class, 'boy_delete'])->name('delivery_boy_delete');
        Route::post('/delivery-boy/update', [DeliveryBoyController::class, 'update'])->name('delivery_boy_update');

        // delivery boy end

        // coupon start
        Route::get('/coupon-code/add', [CouponController::class, 'index'])->name('show_add_coupon');
        Route::post('/coupon-code/save', [CouponController::class, 'save'])->name('save_coupon_code');
        Route::get('/coupon-code/manage', [CouponController::class, 'manage'])->name('manage_coupon_code');
        Route::get('/coupon-code/{id}/{status}', [CouponController::class, 'status_update'])->name('coupon_code_status');
        Route::get('/coupon-code/delete/{id}', [CouponController::class, 'coupon_delete'])->name('delete_coupon_code');
        Route::post('/coupon-code/update', [CouponController::class, 'update'])->name('update_coupon_code');

        // coupon end

        // dish start
        Route::get('/dish/add', [DishController::class, 'index'])->name('show_add_dish');
        Route::post('/dish/save', [DishController::class, 'save'])->name('save_dish_data');
        Route::get('/dish/manage', [DishController::class, 'manage'])->name('manage_dish');
        Route::get('/dish/{id}/{status}', [DishController::class, 'status_update'])->name('dish_status');
        Route::get('/dish/delete/get/{id}', [DishController::class, 'dish_delete'])->name('delete_dish');
        Route::post('/dish/update', [DishController::class, 'update'])->name('update_dish');

        // dish end
    });
});
