<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;

use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\SellerController;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderReturnController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\Setting\SiteSettingController;
use App\Http\Controllers\Front\AddoCartController;
use App\Http\Controllers\Front\CashController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\FrontendController;
use App\Http\Controllers\Front\MyCartController;
use App\Http\Controllers\Front\ProductDetailController;
use App\Http\Controllers\Front\ReviewController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\Front\StripeController;

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

/* ------------- Admin Route -------------- */

Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminController::class, 'Index'])->name('login_from');

    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');

    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');

    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');

    Route::get('/register', [AdminController::class, 'AdminRegister'])->name('admin.register');

    Route::post('/register/create', [AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create');
});
/* ------------- Brand Route -------------- */

Route::controller(BrandController::class)->group(function () {
    route::prefix('brand/')->group(function () {
        Route::get('view', 'ViewBrand')->name('manage-brand');
        Route::post('store', 'storeBrand')->name('store-brand');
        Route::get('delete/{id}', 'deleteBrand')->name('delete-brand');
    });
});
/* ------------- end brand  Route -------------- */
/* ------------- Category Route -------------- */

Route::controller(CategoryController::class)->group(function () {
    route::prefix('category/')->group(function () {
        Route::get('manage', 'ViewCategory')->name('manage-category');
        Route::post('store', 'StoreCategory')->name('add-category');
        Route::get('delete/{id}', 'DeleteCategory')->name('delete-category');
    });
});
/* ------------- end Category Route -------------- */
/* ------------- Home Route -------------- */

Route::controller(HomeController::class)->group(function () {
    route::prefix('home/')->group(function () {
        Route::get('slider/manage', 'SliderManage')->name('manage-home-slider');
        Route::post('slider/store', 'SliderStore')->name('store-slider');
        Route::get('slider/delete/{id}', 'SliderDelete')->name('delete-slider');
    });
});
/* ------------- end Home Route -------------- */

/* ------------- Home Route -------------- */

Route::controller(ProductController::class)->group(function () {
    route::prefix('product/')->group(function () {
        Route::get('add', 'AddProduct')->name('add-new-product');
        Route::post('store', 'StoreProduct')->name('store-product');
        Route::get('manage', 'ManageProduct')->name('manage-product');
        Route::get('edit/{id}', 'EditProduct')->name('edit-product');
        Route::post('update/details/{id}', 'UpdateDetailsProduct')->name('update-product-details');
        Route::get('delete/multi/image/{id}', 'deletemultiimage')->name('delete-multi-image');
        Route::post('update/multi/image/', 'Updatemultiimage')->name('update-multi-image');
        Route::get('delete/{id}', 'deleteProduct')->name('delete-product');
    });
});
/* ------------- end Home Route -------------- */

/* ------------- Coupon Route -------------- */
Route::controller(CouponController::class)->group(function () {
    route::prefix('coupon/')->group(function () {
        Route::get('view', 'ViewCoupon')->name('view-product');
        Route::post('store', 'StoreCoupon')->name('store-coupon');
        Route::get('delete/{id}', 'DeleteCoupon')->name('delete-coupon');
    });
    Route::post('/coupon-apply', 'ApplyCoupon');
    Route::get('/coupon-calculation', 'CalculationCoupon');
    Route::get('/coupon-remove', 'couponRemove');
});
/* -------------end Coupon Route -------------- */
/* -------------Order Route -------------- */
Route::controller(OrderController::class)->group(function () {
    route::prefix('order/')->group(function () {
        Route::get('pending', 'PendingOrder')->name('pending-order');
        Route::get('delete/{id}', 'DeleteOrder')->name('delete-product-order');
        Route::get('detail/{id}', 'PendingOrdersDetails')->name('order-detail-page');
        Route::get('confiremd', 'ConfirmedOrder')->name('confirm-order');
        Route::get('processing', 'ProcessingdOrder')->name('processing-order');
        Route::get('picked', 'PickedOrder')->name('picked-order');
        Route::get('shiped', 'ShipedOrder')->name('shiped-order');
        Route::get('delivered', 'DeliveredOrder')->name('delivered-order');
        Route::get('cancel', 'cancelOrder')->name('cancel-order');

        Route::get('pending/confirm/{id}', 'PendingToConfirm')->name('pending-confirm');
        Route::get('confirm/processing/{id}', 'ConfirmToProcessing')->name('confirm-to-processing');
        Route::get('processing/picked/{id}', 'ProcessingToPicked')->name('processing-to-picked');
        Route::get('picked/ship/{id}', 'PickedToShiped')->name('picked-to-shiped');
        Route::get('ship/deliver/{id}', 'ShipedToDelivered')->name('picked-to-delivered');
        Route::get('cancel/{id}', 'CancelDeliverOrder')->name('cancel-delivered-order');
        Route::get(' /invoice_download/{id}', 'AdminInvoiceDownload')->name('invoice-download');
    });
});
/* ------------- End Order Route -------------- */
/* -------------Return Order Route -------------- */
Route::controller(OrderReturnController::class)->group(function () {
    route::prefix('order/')->group(function () {
        Route::get('return', 'ReturnOrder')->name('return-order');
        Route::get('pending/approve/{id}', 'ApproveOrder')->name('pending-to-approve');
        Route::get('view/approve/', 'ViewApproveOrder')->name('approved-return-order');
    });
});
/* -------------End Return Order Route -------------- */
/* ------------- Report Route -------------- */
Route::controller(ReportController::class)->group(function () {
    route::prefix('report/')->group(function () {
        Route::get('view', 'ReportView')->name('all-reports-view');
        Route::post('search/by/date', 'ReportByDate')->name('report-by-date');
        Route::post('search/by/month', 'SeachByMonth')->name('search-by-month');
        Route::post('search/by/year', 'SeachByYear')->name('search-by-year');
    });
    Route::get('all/user', 'allUser')->name('all-user-view');
});
/* --
/* ------------- End Report Route -------------- */

/* ------------- Managee Site Route -------------- */
Route::controller(SiteSettingController::class)->group(function () {
    route::prefix('site/')->group(function () {
        Route::get('manage/view', 'ManageSiteView')->name('site-setting-view');
        Route::post('update', 'UpdateSiteView')->name('site-update-setting');
    });
});
/* ------------- End Managee Site Route -------------- */
/* ------------- End Admin Route -------------- */




/* ------------- User Route -------------- */

Route::controller(ProfileController::class)->group(function () {
    route::prefix('profile/')->group(function () {
        Route::get('view', 'ViewMyAccount')->name('my-account');
        Route::post('update/{id}', 'updateProfile')->name('update-account-details');
        Route::get('order/detail/{id}', 'OrderDetails')->name('user-order-details');
        Route::post('order/return/{id}', 'ReturnOrder')->name('return-delivered-order');
    });
});

/* ------------- End User Route -------------- */
/* ------------- Home Route -------------- */
/* ------------- Fronend Route -------------- */


Route::controller(FrontendController::class)->group(function () {

    Route::get('/product/view/modal/{id}', 'ViewModel');
});
/* ------------- Frontend home end Route -------------- */


/* ------------- Add to Cart  Route -------------- */
Route::controller(AddoCartController::class)->group(function () {
    Route::post('/cart/data/store/{id}', 'AddToCart');
});
/* -------------  end Add to Cart  Route -------------- */

/* ------------- Add to Cart  Route -------------- */


Route::controller(MyCartController::class)->group(function () {
    Route::get('my/cart/', 'MyCart')->name('my-cart-view');
    Route::get('/get-cart-product', 'MyCartProduct');
    Route::get('/mycart-remove/{rowId}', 'RemoveCart');
    Route::get('/cart-decrement//{rowId}', 'decrementCart');
    Route::get('/cart-increment/{rowId}', 'IncrementCart');
    Route::get('whishlist/view', 'ViewWishlist')->name('whishlist-view'); //whishlist
    Route::post('/add-to-wishlist/{product_id}', 'AddToWishlist'); //whishlist
    Route::get('/get-wishlist-product', 'GetAjaxWishList');
    Route::get('/wishlist-remove/{id}', 'RemoveWishlist');
});

/* -------------  end Add to Cart  Route -------------- */

/* ------------- Prduct detail Route -------------- */

Route::controller(ProductDetailController::class)->group(function () {
    route::prefix('detail/')->group(function () {
        Route::get('view/{id}', 'ProductDetail')->name('product-detail');
    });
    Route::get('all/product/view', 'ViewProduct')->name('all-product-view');
});

Route::post('strip', [StripeController::class,  'StripeOrder'])->name('stripe-order')->middleware('auth');
Route::post('cash', [CashController::class,  'CashOrder'])->name('cash-order')->middleware('auth');



/* ------------- End detail Route -------------- */
/* ------------- Checkout  Route -------------- */

Route::controller(CheckoutController::class)->group(function () {
    route::prefix('checkout/')->group(function () {
        Route::get('view', 'ViewCheckout')->name('checout-page');
        Route::post('store', 'StoreCheckout')->name('store-checkout');
    });
});


/* ------------- End Checkout  Route -------------- */

/* ------------- Search   Route -------------- */
Route::get('/product/brand/{id}', [SearchController::class,  'SearchByBrand']);
Route::get('search/category/{id}', [SearchController::class,  'SearchByCategory']);
Route::get('tag/wise/product/{id}', [SearchController::class,  'SearchBytags']);
Route::post('/search', [SearchController::class,  'SearchByProduct'])->name('product-search');

/* -------------End  Search   Route -------------- */

Route::get('/review/view', [ReviewController::class,  'AllReviewView'])->name('all-review');
Route::post('/review', [ReviewController::class,  'StoreReview'])->name('review-store');
Route::post('/review/delete/{id}', [ReviewController::class,  'DeleteReview'])->name('delete-review');
Route::get('/review/approve/{id}', [ReviewController::class,  'ApproveReview'])->name('approve-review');
/* -------------End Home Route -------------- */

Route::get('/dashboard', [FrontendController::class, 'Index'])->name('dashboard');

Route::get('/login_r', function () {
    return view('front.auth.login_register');
});


require __DIR__ . '/auth.php';
