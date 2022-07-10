<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SliderController;

use App\Http\Controllers\Frontend\addtocartController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\CollectionController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Frontend\FrontendController;

use App\Http\Controllers\Auth\RegisterController;

use Illuminate\Support\Facades\Auth;
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
    // return view('frontend.index');
    //  });

    // Route::get('/',[FrontendController::class,'index']);
    

    Route::get('/searchajax',[CollectionController::class,'SearchautoComplete'])->name('searchproductajax');
    Route::post('/searching',[CollectionController::class,'search_result']);

    //   Home Slider
    Route::get('home-slider',[SliderController::class,'index']);
    Route::get('add-slider',[SliderController::class,'create']);
    Route::post('store-slider',[SliderController::class,'store_slider']);
    Route::get('edit-slider/{id}',[SliderController::class,'edit_slider']);
    Route::put('update-slider/{id}',[SliderController::class,'update_slider']);


    //   Start Frontend
    Route::get('collections',[CollectionController::class,'index']);
    // Route::get('collections/{group_url}/{cate_url}/{subcate_url}',[CollectionController::class,'subcategory_view']);
    // Route::get('collections/{group_url}/{cate_url}/{subcate_url}/{product_url}',[CollectionController::class,'product_detail_view']);
    Route::post('add_to_cart',[addtocartController::class,'add_to_cart'])->name('cart_add');
    Route::post('add_rating',[RatingController::class,'add_rating']);
    Route::get('add-review/{product_slug}/userreview',[ReviewController::class,'Review_Form']);
    Route::post('/add-review',[ReviewController::class,'Create']);
    Route::get('/edit-review/{product_slug}/userreview',[ReviewController::class,'edit_review']);
    Route::put('/update-review',[ReviewController::class,'update_review']);


    // Route::get('cart',[addtocartController::class,'index']);
    Route::get('load_cart_data',[addtocartController::class,'load_cart_data_by_ajax'])->name('load_cart_data');
    Route::post('update_to_cart',[addtocartController::class,'update_to_cart']);
    Route::post('delete_from_cart',[addtocartController::class,'delete_from_cart']);
    Route::get('clear_cart',[addtocartController::class,'clear_cart']);
    Route::get('thank_you',[addtocartController::class,'thank_you']);
    
            //  Start this code after logout previous pages control
    Route::group(['middleware'=>['PreventBackHistory']],function(){
        Auth::routes();
    Route::get('collections/{group_url}/{cate_url}',[CollectionController::class,'category_view']);
    Route::get('collections/{group_url}',[CollectionController::class,'group_view']);
    Route::get('collections/{group_url}/{cate_url}/{subcate_url}',[CollectionController::class,'subcategory_view']);
    Route::get('cart',[addtocartController::class,'index']);
    Route::get('/',[FrontendController::class,'index']);
    Route::get('collections/{group_url}/{cate_url}/{subcate_url}/{product_url}',[CollectionController::class,'product_detail_view']);
    Route::get('new-arrival',[FrontendController::class,'new_arrival']);
    Route::get('new-feature',[FrontendController::class,'new_feature']);
    Route::get('new-popular',[FrontendController::class,'new_popular']);


        });
     //  End this code after logout previous pages control


    //   End Frontend


   

    //   Start Backend Admin

    Route::group(['middleware'=>['auth','isAdmin','PreventBackHistory']],function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('role-edit/{id}',[AdminController::class,'edit']);
    Route::post('role-update/{id}',[AdminController::class,'update']);
    Route::get('role-delete/{id}',[AdminController::class,'delete']);

    //  Collection Group
    Route::get('group',[GroupController::class,'index']);
    Route::get('add-group',[GroupController::class,'add_group_viewpage']);
    Route::post('store-group',[GroupController::class,'store_group']);
    Route::get('edit-group/{id}',[GroupController::class,'edit_group']);
    Route::post('update-group/{id}',[GroupController::class,'update_group']);
    Route::get('delete-group/{id}',[GroupController::class,'delete_group']);
    Route::get('delete-group-record',[GroupController::class,'delete_group_record_restore_page']);
    Route::get('restore-group/{id}',[GroupController::class,'delete_restore']);
    Route::get('permently-delete/{id}',[GroupController::class,'permently_delete']);

    // Category
    Route::get('category',[CategoryController::class,'index']);
    Route::get('add-category',[CategoryController::class,'category_create_view']);
    Route::post('store-category',[CategoryController::class,'store_category']);
    Route::get('edit-category/{id}',[CategoryController::class,'edit_category']);
    Route::post('update-category/{id}',[CategoryController::class,'update_category']);
    Route::get('delete-category/{id}',[CategoryController::class,'delete_category']);
    Route::get('delete-category-record',[CategoryController::class,'delete_category_record_restore_page']);
    Route::get('restore-category/{id}',[CategoryController::class,'delete_restore']);
    Route::get('permently-delete/{id}',[CategoryController::class,'permently_delete']);



    //   SubCategory

    Route::get('sub-category',[SubCategoryController::class,'index']);
    Route::get('add-subcategory',[SubCategoryController::class,'subcategory_create_view']);
    Route::post('store-subcategory',[SubCategoryController::class,'store_subcategory']);
    Route::get('edit-subcategory/{id}',[SubCategoryController::class,'edit_subcategory']);
    Route::post('update-subcategory/{id}',[SubCategoryController::class,'update_subcategory']);
    Route::get('delete-subcategory/{id}',[SubCategoryController::class,'delete_subcategory']);
    Route::get('delete-subcategory-record',[SubCategoryController::class,'delete_subcategory_record_restore_page']);
    Route::get('restore-subcategory/{id}',[SubCategoryController::class,'delete_restore']);
    Route::get('permently-delete/{id}',[CategoryController::class,'permently_delete']);


    });

    //  Product
    Route::get('product',[ProductController::class,'index']);
    Route::get('add-product',[ProductController::class,'product_create_view']);
    Route::post('store-product',[ProductController::class,'product_create']);
    Route::get('edit-product/{id}',[ProductController::class,'product_edit_view']);
    Route::post('store-product/{id}',[ProductController::class,'product_update']);
    Route::get('delete-product/{id}',[ProductController::class,'delete_product']);
    Route::get('delete-product-record',[ProductController::class,'delete_product_record_restore_page']);
    Route::get('restore-product/{id}',[ProductController::class,'delete_restore']);
    Route::get('permently-delete/{id}',[CategoryController::class,'permently_delete']);


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // order managment
    Route::get('orders',[OrderController::class,'index']);
    Route::get('order-view/{order_id}',[OrderController::class,'order_view']);
    Route::get('genereate_invoice/{order_id}',[OrderController::class,'invoice']);
    Route::get('order-proceed/{order_id}',[OrderController::class,'order_proceed']);

    Route::put('order/update-tracking-status/{order_id}',[OrderController::class,'tracking_status']);
    Route::put('order/cancel-order/{order_id}',[OrderController::class,'cancel_order']);
    Route::put('order/complete-order/{order_id}',[OrderController::class,'complete_order']);

        //  Coupon Code System
    Route::get('admin-coupon-view',[CouponController::class,'index']);
    Route::post('coupon-store',[CouponController::class,'coupon_store']);
    Route::get('admin/coupon-edit/{id}',[CouponController::class,'edit']);
    Route::put('coupon-update/{id}',[CouponController::class,'coupon_update']);

    //   End Backend Admin
    // Route::get('slider',[WishlistController::class,'slidertext']);


    Route::group(['middleware'=>['auth','isUser','PreventBackHistory']],function(){
    Route::post('add_wishlist',[WishlistController::class,'add_wishlist']);
    Route::get('user/wishlist',[WishlistController::class,'index']);
    Route::post('remove_form_wishlist',[WishlistController::class,'remove_wishlist_item']);
    Route::get('load_wishlist_data',[WishlistController::class,'load_wishlist_data_by_ajax']);


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/my-profile',[UserController::class,'my_profile']);
    Route::post('/my-profile-update',[UserController::class,'profileupdate']);
    Route::get('checkout',[CheckOutController::class,'index']);
    Route::post('place_order',[CheckOutController::class,'store_order']);
    Route::post('check-coupon-code',[CheckOutController::class,'check_coupon_code']);

    // Razerpay
    Route::post('confirm_razorpay_payment',[CheckOutController::class,'check_amount']);

    });


   Route::group(['middleware'=>['auth','isVendor','PreventBackHistory']],function(){
   Route::get('/vendor-dashboard', function () {
        return view('vendors.dashboard');
    });

   });
   Route::get('/verify',[RegisterController::class,'verify'])->name('verify');

   Route::get('/register-user',[RegisterController::class, 'index']);
  
  
   Route::get('/clear-cache', function(){
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    return 'Done';
});
  
    Route::get('/cache',function(){
        Artisan::call('cache:clear');
    });
    
    //  Route::get('/storage',function(){
    //     Artisan::call('storage:link');
    // });


