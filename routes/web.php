<?php

use App\Http\Controllers\backend\CategoryPostController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\BaivietController;
use App\Http\Controllers\frontend\GiohangController;
use App\Http\Controllers\frontend\LienHeController;
use App\Http\Controllers\frontend\SanphamController;
use App\Http\Controllers\frontend\TimkiemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ConfigController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PageController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\UserController;




//Khai báo Route frontend
Route::get('/', [HomeController::class, 'index'])->name('site.home');
Route::get('/trang-chu', [HomeController::class, 'index']);
Route::post('/tim-kiem', [TimkiemController::class, 'search']);



// Danh mục sản phẩm backend
Route::get('/danh-muc-san-pham/{category_id}', [App\Http\Controllers\frontend\ProductController::class, 'category']);
Route::get('/thuong-hieu-san-pham/{brand_id}', [App\Http\Controllers\frontend\ProductController::class, 'brand']);
Route::get('/chi-tiet-san-pham/{product_id}', [App\Http\Controllers\frontend\ProductController::class, 'detail']);


//Shopping Cart
Route::get('/cart', [GiohangController::class, 'index'])->name('cart.index');
Route::get('/add-cart/{product_id}', [GiohangController::class, 'AddCart']);
Route::get('/cart/delete/{product_id}', [GiohangController::class, 'deleteCartItem'])->name('deleteCartItem');
Route::get('/cart/increase/{id}', [GiohangController::class, 'increaseQuantity'])->name('cart.increase');
Route::get('/cart/decrease/{id}', [GiohangController::class, 'decreaseQuantity'])->name('cart.decrease');

//Checkout && Login-Checkout
Route::get('/checkout-login', [CheckoutController::class, 'checkout_login']);
Route::post('/login-user', [CheckoutController::class, 'login_user']);
Route::get('/checkout-logout', [CheckoutController::class, 'checkout_logout']);
Route::post('/add-user', [CheckoutController::class, 'add_user']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/save-checkout', [CheckoutController::class, 'save_checkout']);







//backend login/logout
Route::get('/login', [UserController::class, 'index']);
Route::get('/logout', [UserController::class, 'logout']);
Route::post('/login-dashboard', [UserController::class, 'dashboard']);




// Route::get('/logout', [UserController::class, 'logout']);




//Shopping Cart
Route::get('/cart', [GiohangController::class, 'index'])->name('cart.index');
Route::get('/add-cart/{product_id}', [GiohangController::class, 'AddCart']);
Route::get('/cart/delete/{product_id}', [GiohangController::class, 'deleteCartItem'])->name('deleteCartItem');
Route::get('/cart/increase/{id}', [GiohangController::class, 'increaseQuantity'])->name('cart.increase');
Route::get('/cart/decrease/{id}', [GiohangController::class, 'decreaseQuantity'])->name('cart.decrease');

//Bai viet
Route::get('/danh-muc-bai-viet/{post_slug}', [BaivietController::class, 'danh_muc_bai_viet']);
Route::get('/bai-viet/{post_slug}', [BaivietController::class, 'bai_viet']);


//Khai báo route trong quản lý
Route::prefix('admin')->group(function () {
    #admin
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    #manage-order
    Route::get('/manage-order', [OrderController::class, 'manage_other']);
    Route::get('/delete-order/{order_id}', [OrderController::class, 'delete_order']);
    Route::get('/unactive-order/{order_id}', [OrderController::class, 'unactive_order']);
    Route::get('/active-order/{order_id}', [OrderController::class, 'active_order']);
    Route::get('/view-order/{order_id}', [OrderController::class, 'view_order']);



    #admin/banner
    Route::resource('banner', BannerController::class);
    Route::get('/all-banner', [DashboardController::class, 'all_banner']);
    Route::get('/add-banner', [BannerController::class, 'add_banner']);
    Route::get('/edit-banner/{banner_id}', [BannerController::class, 'edit_banner']);
    Route::get('/delete-banner/{banner_id}', [BannerController::class, 'delete_banner']);
    Route::get('/unactive-banner/{banner_id}', [BannerController::class, 'unactive_banner']);
    Route::get('/active-banner/{banner_id}', [BannerController::class, 'active_banner']);
    Route::post('/save-banner', [BannerController::class, 'save_banner']);
    Route::post('/update-banner/{banner_id}', [BannerController::class, 'update_banner']);


    #admin/brand
    Route::resource('brand', BrandController::class);
    Route::get('/all-brand-product', [DashboardController::class, 'all_brand_product']);
    Route::get('/add-brand-product', [BrandController::class, 'add_brand_product']);
    Route::get('/edit-brand-product/{brand_product_id}', [BrandController::class, 'edit_brand_product']);
    Route::get('/delete-brand-product/{brand_product_id}', [BrandController::class, 'delete_brand_product']);
    Route::get('/unactive-brand-product/{brand_product_id}', [BrandController::class, 'unactive_brand_product']);
    Route::get('/active-brand-product/{brand_product_id}', [BrandController::class, 'active_brand_product']);
    Route::post('/save-brand-product', [BrandController::class, 'save_brand_product']);
    Route::post('/update-brand-product/{brand_product_id}', [BrandController::class, 'update_brand_product']);

    #admin/category
    Route::resource('category', CategoryController::class);
    Route::get('/all-category-product', [DashboardController::class, 'all_category_product']);
    Route::get('/add-category-product', [CategoryController::class, 'add_category_product']);
    Route::get('/edit-category-product/{category_product_id}', [CategoryController::class, 'edit_category_product']);
    Route::get('/delete-category-product/{category_product_id}', [CategoryController::class, 'delete_category_product']);
    Route::get('/unactive-category-product/{category_product_id}', [CategoryController::class, 'unactive_category_product']);
    Route::get('/active-category-product/{category_product_id}', [CategoryController::class, 'active_category_product']);
    Route::post('/save-category-product', [CategoryController::class, 'save_category_product']);
    Route::post('/update-category-product/{category_product_id}', [CategoryController::class, 'update_category_product']);
    #admin/config
    Route::resource('config', ConfigController::class);

    #admin/contact
    Route::resource('contact', ContactController::class);

    #admin/customer
    Route::resource('customer', CustomerController::class);

    #admin/menu
    Route::resource('menu', MenuController::class);
    Route::get('/all-menu', [DashboardController::class, 'all_menu']);
    Route::get('/add-menu', [MenuController::class, 'add_menu']);
    Route::get('/edit-menu/{menu_id}', [MenuController::class, 'edit_menu']);
    Route::get('/delete-menu/{menu_id}', [MenuController::class, 'delete_menu']);
    Route::get('/unactive-menu/{menu_id}', [MenuController::class, 'unactive_menu']);
    Route::get('/active-menu/{menu_id}', [MenuController::class, 'active_menu']);
    Route::post('/save-menu', [MenuController::class, 'save_menu']);
    Route::post('/update-menu/{menu_id}', [MenuController::class, 'update_menu']);


    #admin/order
    Route::resource('order', OrderController::class);

    #admin/page
    Route::resource('page', PageController::class);

    #admin/categorypost
    Route::resource('categorypost', CategoryPostController::class);
    Route::get('/all-categorypost', [DashboardController::class, 'all_categorypost']);
    Route::get('/add-categorypost', [CategoryPostController::class, 'add_categorypost']);
    Route::get('/edit-categorypost/{categorypost_id}', [CategoryPostController::class, 'edit_categorypost']);
    Route::get('/delete-categorypost/{categorypost_id}', [CategoryPostController::class, 'delete_categorypost']);
    Route::get('/unactive-categorypost/{categorypost_id}', [CategoryPostController::class, 'unactive_categorypost']);
    Route::get('/active-categorypost/{categorypost_id}', [CategoryPostController::class, 'active_categorypost']);
    Route::post('/save-categorypost', [CategoryPostController::class, 'save_categorypost']);
    Route::post('/update-categorypost/{categorypost_id}', [CategoryPostController::class, 'update_categorypost']);

    #admin/post
    Route::resource('post', PostController::class);
    Route::get('/all-post', [DashboardController::class, 'all_post']);
    Route::get('/add-post', [PostController::class, 'add_post']);
    Route::get('/edit-post/{post_id}', [PostController::class, 'edit_post']);
    Route::get('/delete-post/{post_id}', [PostController::class, 'delete_post']);
    Route::get('/unactive-post/{post_id}', [PostController::class, 'unactive_post']);
    Route::get('/active-post/{post_id}', [PostController::class, 'active_post']);
    Route::post('/save-post', [PostController::class, 'save_post']);
    Route::post('/update-post/{post_id}', [PostController::class, 'update_post']);





    #admin/product
    Route::resource('product', ProductController::class);
    Route::get('/all-product', [DashboardController::class, 'all_product']);
    Route::get('/add-product', [ProductController::class, 'add_product']);
    Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
    Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);
    Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
    Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);
    Route::post('/save-product', [ProductController::class, 'save_product']);
    Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);




    #admin/topic
    Route::resource('topic', TopicController::class);
    Route::get('/all-topic', [DashboardController::class, 'all_topic']);
    Route::get('/add-topic', [TopicController::class, 'add_topic']);
    Route::get('/edit-topic/{topic_id}', [TopicController::class, 'edit_topic']);
    Route::get('/delete-topic/{topic_id}', [TopicController::class, 'delete_topic']);
    Route::get('/unactive-topic/{topic_id}', [TopicController::class, 'unactive_topic']);
    Route::get('/active-topic/{topic_id}', [TopicController::class, 'active_topic']);
    Route::post('/save-topic', [TopicController::class, 'save_topic']);
    Route::post('/update-topic/{topic_id}', [TopicController::class, 'update_topic']);

    #admin/user
    Route::resource('user', UserController::class);
    Route::get('/all-user', [DashboardController::class, 'all_user']);
    Route::get('/add-user', [UserController::class, 'add_user']);
    Route::get('/edit-user/{user_id}', [UserController::class, 'edit_user']);
    Route::get('/delete-user/{user_id}', [UserController::class, 'delete_user']);
    Route::get('/unactive-user/{user_id}', [UserController::class, 'unactive_user']);
    Route::get('/active-user/{user_id}', [UserController::class, 'active_user']);
    Route::get('/unactive-admin-user/{user_id}', [UserController::class, 'unactive_admin_user']);
    Route::get('/active-admin-user/{user_id}', [UserController::class, 'active_admin_user']);
    Route::post('/save-user', [UserController::class, 'save_user']);
    Route::post('/update-user/{user_id}', [UserController::class, 'update_user']);
});