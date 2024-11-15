<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GioHangController;

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

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


// // ------------------------------
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/trang-chu', 'App\Http\Controllers\HomeController@index');
Route::get('/tim-kiem', 'App\Http\Controllers\HomeController@search');
Route::get('/tim-kiem-nang-cao', 'App\Http\Controllers\HomeController@avanced_search');
Route::get('/tim-kiem-nang-cao-danh-muc', 'App\Http\Controllers\HomeController@avanced_search_category');


Route::get('/news', 'App\Http\Controllers\HomeController@news');
Route::get('/detail-news1', 'App\Http\Controllers\HomeController@detail_news1');
Route::get('/detail-news2', 'App\Http\Controllers\HomeController@detail_news2');
Route::get('/detail-news3', 'App\Http\Controllers\HomeController@detail_news3');


Route::get('/shop', 'App\Http\Controllers\HomeController@shop');
Route::get('/detail/{id}', 'App\Http\Controllers\HomeController@detail');
// Route::get('/cart', 'App\Http\Controllers\HomeController@cart');
Route::get('/checkout-customer', 'App\Http\Controllers\HomeController@checkout_customer');
Route::get('/contact', 'App\Http\Controllers\HomeController@contact');
Route::get('/about', 'App\Http\Controllers\HomeController@about');
Route::get('/profile/{id}', 'App\Http\Controllers\HomeController@profile');

// user-profile, sau khi dang nhap, nhung nguoi khac co the xem profile cua minh
Route::get('/user-profile/{id}', 'App\Http\Controllers\HomeController@user_profile');


Route::get('/edit-profile/{id}', 'App\Http\Controllers\CustomerController@edit_profile');
Route::post('/update-profile/{id}', 'App\Http\Controllers\CustomerController@update_profile');
Route::post('/update-role-seller/{id}', 'App\Http\Controllers\CustomerController@update_role_seller');
Route::post('/update-avatar/{id}', 'App\Http\Controllers\CustomerController@update_avatar');

Route::post('/add-post/{id}', 'App\Http\Controllers\CustomerController@add_post');

// comment
Route::post('/submit-comment', 'App\Http\Controllers\PostController@submit_comment');
Route::post('/edit-comment', 'App\Http\Controllers\PostController@edit_comment');

Route::get('/latest-news', 'App\Http\Controllers\HomeController@latest_news');
Route::get('/post', 'App\Http\Controllers\HomeController@post');
Route::get('/shop-details/{id}', 'App\Http\Controllers\HomeController@shop_details');

// Gio hang
// cart
Route::group(['prefix' => 'giohang'], function () {
    Route::get('/', [GioHangController::class, 'index'])->name('giohang.index');
    Route::get('/add/{product}', [GioHangController::class, 'add'])->name('giohang.add');
    Route::get('/delete/{product}', [GioHangController::class, 'delete'])->name('giohang.delete');
    Route::get('/update/{product}', [GioHangController::class, 'update'])->name('giohang.update');
    Route::get('/clear', [GioHangController::class, 'clear'])->name('giohang.clear');
});

// login customer
Route::get('/login-customer', 'App\Http\Controllers\HomeController@login_customer');
Route::get('/signup-customer', 'App\Http\Controllers\HomeController@signup_customer');

// Admin
//danh muc san pham - trang chu
Route::get('/danh-muc-san-pham', 'App\Http\Controllers\CategoryProduct@show_category_home');

// Route::get('/danh-muc-san-pham/{category_id}', 'App\Http\Controllers\CategoryProduct@show_category_home');
Route::get('/chi-tiet-san-pham/{product_id}', 'App\Http\Controllers\ProductController@details_product');

//backend
Route::get('/admin', 'App\Http\Controllers\AdminController@index');

// tạm thời ngưng lại 
Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_dashboard');
Route::post('/admin-dashboard', 'App\Http\Controllers\AdminController@dashboard');
Route::get('/logout', 'App\Http\Controllers\AdminController@logout');

//category
Route::get('/add-category-product', 'App\Http\Controllers\CategoryProduct@add_category_product');
Route::get('/all-category-product', 'App\Http\Controllers\CategoryProduct@all_category_product');
Route::get('/unactive-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@active_category_product');
Route::get('/edit-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@delete_category_product');
Route::post('/save-category-product', 'App\Http\Controllers\CategoryProduct@save_category_product');
Route::get('/update-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@update_category_product');
Route::get('/tim-kiem-category', 'App\Http\Controllers\CategoryProduct@tim_kiem_category');

//product
// Route::get('/add-product', 'App\Http\Controllers\ProductController@add_product');
// Route::get('/all-product', 'App\Http\Controllers\ProductController@all_product');
// Route::get('/unactive-product/{product_id}', 'App\Http\Controllers\ProductController@unactive_product');
// Route::get('/active-product/{product_id}', 'App\Http\Controllers\ProductController@active_product');
// Route::get('/edit-product/{product_id}', 'App\Http\Controllers\ProductController@edit_product');
// Route::get('/delete-product/{product_id}', 'App\Http\Controllers\ProductController@delete_product');
// Route::post('/save-product', 'App\Http\Controllers\ProductController@save_product');
// Route::post('/update-product/{product_id}', 'App\Http\Controllers\ProductController@update_product');
// Route::get('/tim-kiem-product', 'App\Http\Controllers\ProductController@tim_kiem_product');
// Route::post('/tim-kiem-nang-cao-product', 'App\Http\Controllers\ProductController@tim_kiem_nang_cao_product');
//ratings
// Route::get('/all-rating', 'App\Http\Controllers\CustomerController@all_rating');


//comment

Route::get('/all-comment', 'App\Http\Controllers\PostController@all_comment');
Route::get('/unactive-comment/{comment_id}', 'App\Http\Controllers\PostController@unactive_comment');
Route::get('/active-comment/{comment_id}', 'App\Http\Controllers\PostController@active_comment');
Route::get('/tim-kiem-binh-luan', 'App\Http\Controllers\PostController@tim_kiem_binh_luan');

// notification

Route::get('/add-notification', 'App\Http\Controllers\NotificationController@add_notification');
Route::get('/all-notification', 'App\Http\Controllers\NotificationController@all_notification');
Route::get('/unactive-notification/{category_product_id}', 'App\Http\Controllers\NotificationController@unactive_notification');
Route::get('/active-notification/{category_product_id}', 'App\Http\Controllers\NotificationController@active_notification');
Route::get('/edit-notification/{category_product_id}', 'App\Http\Controllers\NotificationController@edit_notification');
Route::get('/delete-notification/{category_product_id}', 'App\Http\Controllers\NotificationController@delete_notification');
Route::post('/save-notification', 'App\Http\Controllers\NotificationController@save_notification');
Route::get('/update-notification/{category_product_id}', 'App\Http\Controllers\NotificationController@update_notification');
Route::get('/tim-kiem-notification', 'App\Http\Controllers\NotificationController@tim_kiem_notification');


// post
Route::get('/all-post', 'App\Http\Controllers\PostController@all_post');
Route::get('/unactive-post/{post_id}', 'App\Http\Controllers\PostController@unactive_post');
Route::get('/active-post/{post_id}', 'App\Http\Controllers\PostController@active_post');
Route::get('/tim-kiem-post', 'App\Http\Controllers\PostController@tim_kiem_post');
Route::get('/all-post', 'App\Http\Controllers\PostController@all_post');
Route::get('/delete-post/{post_id}', 'App\Http\Controllers\PostController@delete_post');
Route::get('/view-post/{post_id}', 'App\Http\Controllers\PostController@view_post');
Route::post('/update-post-status', 'App\Http\Controllers\PostController@update_post_status');


// checkout
// Route::get('/login-checkout', 'App\Http\Controllers\CheckoutController@login_checkout');
Route::get('/logout-checkout', 'App\Http\Controllers\CheckoutController@logout_checkout');
// Route::get('/signup-checkout', 'App\Http\Controllers\CheckoutController@signup_checkout');
// Route::post('/add-customer', 'App\Http\Controllers\CheckoutController@add_customer');
//checkout
Route::get('/checkout', 'App\Http\Controllers\CheckoutController@checkout');
Route::post('/save-checkout-customer', 'App\Http\Controllers\CheckoutController@save_checkout_customer');
// Route::post('/login-customer-login', 'App\Http\Controllers\CheckoutController@login_customer_login');
// Route::get('/payment', 'App\Http\Controllers\CheckoutController@payment');

// view orders customer
Route::get('/vieworder-customer/{customer_name}', 'App\Http\Controllers\CustomerController@vieworder_customer');
Route::get('/viewdetails-order-customer/{order_id}', 'App\Http\Controllers\CustomerController@viewdetails_order_customer');
Route::get('/list-customer/{user_id}', 'App\Http\Controllers\CustomerController@list_customer');
Route::get('/list-order/{user_id}', 'App\Http\Controllers\CustomerController@list_order');
Route::get('/approve-orders/{order_id}', 'App\Http\Controllers\CustomerController@approve_orders');


Route::post('/update-order-status', 'App\Http\Controllers\CustomerController@update_order_status');
Route::get('/view-post-user/{user_id}', 'App\Http\Controllers\CustomerController@view_post_user');

Route::get('/list-post/{user_id}', 'App\Http\Controllers\CustomerController@list_post');
Route::get('/delete-post-user/{post_id}', 'App\Http\Controllers\CustomerController@delete_post_user');

Route::post('/update-post-user/{post_id}', 'App\Http\Controllers\CustomerController@update_post_user');

Route::post('/insert-rating', 'App\Http\Controllers\CustomerController@insert_rating');
Route::post('/insert-rating-user', 'App\Http\Controllers\CustomerController@insert_rating_user');


// Route::post('/update-post-user/{user_id}', 'App\Http\Controllers\CustomerController@update_post_user');










// order     

Route::get('/manage-order', 'App\Http\Controllers\OrderController@manage_order');
// Route::get('/print-order/{order_id}', 'App\Http\Controllers\OrderController@print_order');
// Route::get('/manage-order', 'App\Http\Controllers\CheckoutController@manage_order');
Route::get('/view-order/{order_id}', 'App\Http\Controllers\OrderController@view_order');
Route::post('/update-order-qty', 'App\Http\Controllers\OrderController@update_order_qty');
Route::post('/update-order-quantity', 'App\Http\Controllers\OrderController@update_order_qty');
Route::post('/update-qty', 'App\Http\Controllers\OrderController@update_qty');


// update quantity product in report
//ADMIN
//authentication roles
Route::get('/register-auth', 'App\Http\Controllers\AuthController@register_auth');
//tam thoi dong lai
// Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::get('/login-auth', 'App\Http\Controllers\AuthController@login_auth');
//dang ky admin
Route::post('store-users-in-register-page', 'App\Http\Controllers\AuthController@store_users_in_register_page');

//tam dong
Route::post('/login-admin', 'App\Http\Controllers\AuthController@login');
// Route::get('/logout-auth', 'App\Http\Controllers\AuthController@logout_auth');

// user
Route::get('/users', 'App\Http\Controllers\UserController@index');
Route::post('/assign-roles', 'App\Http\Controllers\UserController@assign_roles');
Route::get('add-users', 'App\Http\Controllers\UserController@add_users');
Route::post('store-users', 'App\Http\Controllers\UserController@store_users');




Route::get('/delete-user-roles/{admin_id}', 'App\Http\Controllers\UserController@delete_user_roles');
Route::get('/tim-kiem-admin', 'App\Http\Controllers\UserController@search');


// backend-thong ke
Route::post('/filter-by-date', 'App\Http\Controllers\AdminController@filter_by_date');
// Route::post('/dashboard-filter', 'App\Http\Controllers\AdminController@dashboard_filter');

Route::post('/get-30-days', 'App\Http\Controllers\AdminController@get30days');

// bao cao khi het san pham
// Route::get('/report', 'App\Http\Controllers\ReportController@report');
// Route::post('/tim-kiem-report', 'App\Http\Controllers\ReportController@tim_kiem_report');
// Route::post('/tim-kiem-nang-cao-report', 'App\Http\Controllers\ReportController@tim_kiem_nang_cao_report');
// // nhập thêm sản phẩm vào trong kho trong chức năng báo cáo sản phẩm sắp hết
// Route::post('/import-product-qty', 'App\Http\Controllers\ReportController@import_product_qty');

// customer
Route::get('/all-customers', 'App\Http\Controllers\CustomerController@all_customers');
Route::get('/tim-kiem-customer', 'App\Http\Controllers\CustomerController@tim_kiem_customer');

//store
Route::get('/all-stores', 'App\Http\Controllers\CustomerController@all_stores');
Route::get('/tim-kiem-stores', 'App\Http\Controllers\CustomerController@tim_kiem_stores');

// search manage order
Route::get('/tim-kiem-manageorder', 'App\Http\Controllers\OrderController@tim_kiem_manageorder');

Route::get('/active-store/{user_id}', 'App\Http\Controllers\CustomerController@active_store');
Route::get('/unactive-store/{user_id}', 'App\Http\Controllers\CustomerController@unactive_store');

Route::get('/active-user/{user_id}', 'App\Http\Controllers\CustomerController@active_user');
Route::get('/unactive-user/{user_id}', 'App\Http\Controllers\CustomerController@unactive_user');

Route::get('/active-is-seller/{user_id}', 'App\Http\Controllers\CustomerController@active_is_seller');

