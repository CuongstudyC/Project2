<?php

use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\chatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Goods;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginController_admin;
use App\Http\Controllers\ManagementAdminController;
use App\Http\Controllers\ManagementUser;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserFrontController;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin', function () {
    return view('admin/login/index');
});
Route::prefix('admin')->group(function () {
    Route::prefix('login')->group(function () {
        Route::get('/', [LoginController_admin::class, 'index'])->name('login_admin');

        Route::get('/confirm_email/{email}',[LoginController_admin::class, 'submitConfirmEmail']);
        Route::get('/register1', [LoginController_admin::class, 'register1']);
        Route::get('/register', [LoginController_admin::class, 'register'])->name('register_admin');

        Route::post('/submitRegister', [LoginController_admin::class, 'submitRegister'])->name('submitRegister');

        Route::post('/submitLogin', [LoginController_admin::class, 'submitLogin'])->name('submitLogin');

        Route::get('/validateForgot', [LoginController_admin::class, 'validateForgot'])->name('validateForgot');

        Route::post('/submitEmailForgot', [LoginController_admin::class, 'submitEmailForgot'])->name('submitEmailForgot');

        Route::post('/submitResetPass', [LoginController_admin::class, 'submitResetPass'])->name('submitResetPass');

        Route::post('/submitResetPass', [LoginController_admin::class, 'submitResetPass'])->name('submitResetPass');

        Route::post('/logout', [LoginController_admin::class, 'logout'])->name('logout_admin');

        Route::get('/index_dashboard', [LoginController_admin::class, 'dashboard'])->name('Dashboard_index');
    });
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/layouts/layout', [LoginController_admin::class, 'gotoMainPage'])->name('layout');

        Route::prefix('goods')->group(function () {
            Route::get('/index', [GoodsController::class, 'index'])->name('goods_index');
            Route::get('/create', [GoodsController::class, 'create'])->name('goods_create');

            Route::post('/submitCreateGoods', [GoodsController::class, 'submitCreate'])->name('submitCreate');

            Route::get('/edit/{id}', [GoodsController::class, 'updateGoods']);

            Route::post('/submitUpdateGoods', [GoodsController::class, 'submitUpdate'])->name('submitUpdate');

            Route::get('/delete/{id}', [GoodsController::class, 'deleteGoods']);

            Route::post('/searchGoods', [GoodsController::class, 'searchGoods'])->name('searchGoods');
        });

        Route::prefix('categories')->group(function () {
            Route::get('/index', [CategoriesController::class, 'index'])->name('categories_index');

            Route::get('/create', [CategoriesController::class, 'create'])->name('Category_create');

            Route::post('submitCreateCategory', [CategoriesController::class, 'submitCreate'])->name('submitCreateCategory');

            Route::get('/edit/{id}', [CategoriesController::class, 'updateCategories']);

            Route::post('/submitUpdateCategory', [CategoriesController::class, 'submitUpdateCategory'])->name('submitUpdateCategory');

            Route::get('/delete/{id}', [CategoriesController::class, 'deleteCategories']);

            Route::post('/searchCategories', [CategoriesController::class, 'searchCategories'])->name('searchCategories');
        });

        Route::prefix('event')->group(function () {
            Route::get('index', [EventController::class, 'index'])->name('events_index');

            Route::get('create', [EventController::class, 'create'])->name('event_create');

            Route::post('submitCreateEvent', [EventController::class, 'submitCreate'])->name('submitCreateEvent');

            Route::get('/edit/{id}', [EventController::class, 'updateEvent']);

            Route::post('/submitUpdateEvent', [EventController::class, 'submitUpdate'])->name('submitUpdateEvent');

            Route::get('/delete/{id}', [EventController::class, 'deleteEvent']);

            Route::post('/searchEvent', [EventController::class, 'searchEvent'])->name('searchEvent');
        });

        Route::prefix('products')->group(function () {
            Route::get('/index', [ProductController::class, 'index'])->name('products_index');

            Route::get('/create', [ProductController::class, 'create'])->name('products_create');

            Route::post('/submitCreateProduct', [ProductController::class, 'submitCreate'])->name('submitCreateProduct');

            Route::get('/edit/{id}', [ProductController::class, 'updateProduct']);

            Route::post('/submitUpdateProduct', [ProductController::class, 'submitUpdate'])->name('submitUpdateProduct');

            Route::get('/delete/{id}', [ProductController::class, 'deleteProduct']);

            Route::post('/searchProduct', [ProductController::class, 'searchProduct'])->name('searchProduct');
        });

        Route::prefix('manage_users')->group(function () {
            Route::get('/index', [ManagementUser::class, 'index'])->name('users_index');

            Route::get('/delete/{id}', [ManagementUser::class, 'delete']);

            Route::post('/searchUsers', [ManagementUser::class, 'searchUsers'])->name('searchUsers');

            Route::get('/orderUser', [ManagementUser::class, 'orders'])->name('users_order');

            Route::get('/delete_order/{id}', [ManagementUser::class, 'delete_order']);

            Route::post('/searchOrder', [ManagementUser::class, 'searchOrder'])->name('searchOrders');

            Route::get('/order_status', [ManagementUser::class, 'order_status'])->name('user_status');

            Route::post('/updateShipping/{id}', [ManagementUser::class, 'updateShipping']);

            Route::get('/create', [ManagementUser::class, 'createShippingOrder'])->name('Shipping_create');

            Route::post('/submitCreateShipping', [ManagementUser::class, 'submitCreate'])->name('submitCreateShipping');

            // Route::get('/delete_status/{id}', [ManagementUser::class, 'delete_shipping']);

            Route::post('/searchShipping', [ManagementUser::class, 'searchShipping'])->name('searchShipping');
        });
        Route::prefix('report')->group(function () {
            Route::get('/index', [ReportController::class, 'index'])->name('report_index');

            Route::get('/create', [ReportController::class, 'create'])->name('report_create');

            Route::post('/SubmitcreateReport', [ReportController::class, 'submitCreate'])->name('submitCreateReport');

            Route::get('/delete/{id}', [ReportController::class, 'delete_report']);

            Route::post('/searchReport', [ReportController::class, 'searchReport'])->name('searchReport');
        });

        Route::prefix('manage_admin')->group(function () {
            Route::get('/index', [ManagementAdminController::class, 'index'])->name('admin_index');

            Route::get('/update', [ManagementAdminController::class, 'update'])->name('admin_update');

            Route::post('/submitUpdate', [ManagementAdminController::class, 'submitUpdate'])->name('submitUpdateAdmin');

            // Route::post('/edit/{id}', [ManagementAdminController::class, 'updatePosition']);

            Route::post('/searchAdmin', [ManagementAdminController::class, 'searchAdmin'])->name('searchAdmin');

            Route::get('/registerForStaff',[ManagementAdminController::class, 'registerStaff'])->name('register_staff');
            Route::post('/submitCreateStaff', [ManagementAdminController::class, 'submitCreateStaff'])->name('create_staff');

        });
    });
    Route::get('/navbar',[chatController::class, 'navChat']);
    Route::get('/displayContent/{id}',[chatController::class, 'displayChat']);
    Route::get('/submitChatAdmin/{id}/{value}',[chatController::class,'submitChatAdmin']);


});

Route::prefix('users')->group(function () {
    Route::get('/index', [UserFrontController::class, 'index'])->name('index_front');
    Route::middleware('user')->group(function(){
    Route::get('/about', [UserFrontController::class, 'about'])->name('about_front');
    Route::get('/cart', [UserFrontController::class, 'cart'])->name('cart_front');
    Route::get('/product', [UserFrontController::class, 'product'])->name('product_front');
    Route::get('/location', [UserFrontController::class, 'location'])->name('location_front');
    Route::get('/edit/{id}', [UserFrontController::class, 'showProduct']);
    Route::get('/orders_history',[UserFrontController::class, 'User_Orders'])->name('User_Front_Orders');

    Route::get('/display', [UserFrontController::class, 'displayAllProduct'])->name('products_showAll');


    Route::post('/submitCountCart', [UserFrontController::class, 'countProduct'])->name('products_count');


    Route::post('/changeCart', [UserFrontController::class, 'updateAndDeleteProduct'])->name('Cart_change');

    Route::post('/radioSelected', [UserFrontController::class, 'radioChecked']);

    Route::post('/submitCheckOut', [UserFrontController::class, 'submitCheckOut'])->name('submitCheckOut');

    Route::get('/vnPayCheck', [UserFrontController::class, 'vnPayCheck']);
    Route::get('/checkout', [UserFrontController::class, 'checkout'])->name('checkout_front');

    Route::get('/product_detail/{id}',[UserFrontController::class,'Product_Detail']);

    Route::post('/submitUpdate', [UserFrontController::class, 'submitUpdate'])->name('submitUpdateDetail');
});

    Route::get('/displayChatUser',[chatController::class, 'displayChatUser']);
    Route::get('submitChatUser/{value}',[chatController::class, 'submitChatUser']);


});
Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('login/{provider}', [AuthLoginController::class, 'redirectToProvider'])->name('social.login');
Route::get('login/{provider}/callback', [AuthLoginController::class, 'handleProviderCallback'])->name('social.callback');

Route::post('/register', [RegisterController::class, 'index'])->name('register');
