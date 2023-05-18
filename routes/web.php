<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\DeliverAreaController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CompareController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\CashOnDeliveryController;
use App\Http\Controllers\User\AllUserController;

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

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/', [IndexController::class, 'Index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth','verified'])->group(function() {

    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');
    Route::post('/user/profile/edit', [UserController::class, 'UserProfileEdit'])->name('user.profile.edit');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');
    
    }); // Group Middleware End
    

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// Admin Dashboard
Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/edit', [AdminController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
    Route::get('/admin/profile/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/change/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');
});
// Admin Login
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class);

Route::middleware(['auth','role:admin'])->group(function() {


    // Brand All Route 
   Route::controller(BrandController::class)->group(function(){
       Route::get('/all/brand' , 'AllBrand')->name('all.brand');
       Route::get('/add/brand' , 'AddBrand')->name('add.brand');
       Route::post('/store/brand' , 'StoreBrand')->name('store.brand');
       Route::get('/edit/brand/{id}' , 'EditBrand')->name('edit.brand');
       Route::post('/update/brand' , 'UpdateBrand')->name('update.brand');
       Route::get('/delete/brand/{id}' , 'DeleteBrand')->name('delete.brand');
   
   });


// Category All Route 
Route::controller(CategoryController::class)->group(function(){
    Route::get('/all/category' , 'AllCategory')->name('all.category');
    Route::get('/add/category' , 'AddCategory')->name('add.category');
    Route::post('/store/category' , 'StoreCategory')->name('store.category');
    Route::get('/edit/category/{id}' , 'EditCategory')->name('edit.category');
    Route::post('/update/category' , 'UpdateCategory')->name('update.category');
    Route::get('/delete/category/{id}' , 'DeleteCategory')->name('delete.category');


});

// SubCategory All Route 
Route::controller(SubCategoryController::class)->group(function(){
    Route::get('/all/subcategory' , 'AllSubCategory')->name('all.subcategory');
    Route::get('/add/subcategory' , 'AddSubCategory')->name('add.subcategory');
    Route::post('/store/subcategory' , 'StoreSubCategory')->name('store.subcategory');
    Route::get('/edit/subcategory/{id}' , 'EditSubCategory')->name('edit.subcategory');
    Route::post('/update/subcategory' , 'UpdateSubCategory')->name('update.subcategory');
    Route::get('/delete/subcategory/{id}' , 'DeleteSubCategory')->name('delete.subcategory');
    Route::get('/subcategory/ajax/{category_id}' , 'GetSubCategory');

});

// Product All Route 
Route::controller(ProductController::class)->group(function(){
    Route::get('/all/product' , 'AllProduct')->name('all.product');
    Route::get('/add/product' , 'AddProduct')->name('add.product');
    Route::post('/store/product' , 'StoreProduct')->name('store.product');
    Route::get('/edit/product/{id}' , 'EditProduct')->name('edit.product');
    Route::post('/update/product' , 'UpdateProduct')->name('update.product');
    Route::post('/update/product/thumbnail' , 'UpdateProductThumbnail')->name('update.product.thumbnail');
    Route::post('/update/product/multiImage' , 'UpdateProductMultiImage')->name('update.product.multiImage');
    Route::get('/product/multiImg/delete/{id}' , 'MulitImageDelete')->name('product.multiImg.delete');
    Route::get('/product/inactive/{id}' , 'ProductInactive')->name('product.inactive');
    Route::get('/product/active/{id}' , 'ProductActive')->name('product.active');
    Route::get('/delete/product/{id}' , 'ProductDelete')->name('delete.product');
    //For Product Stock Level Manage
    Route::get('/product/stock' , 'ProductStock')->name('product.stock');

});

// Slider All Route 
Route::controller(SliderController::class)->group(function(){
    Route::get('/all/slider' , 'AllSlider')->name('all.slider');
    Route::get('/add/slider' , 'AddSlider')->name('add.slider');
    Route::post('/store/slider' , 'StoreSlider')->name('store.slider');
    Route::get('/edit/slider/{id}' , 'EditSlider')->name('edit.slider');
    Route::post('/update/slider' , 'UpdateSlider')->name('update.slider');
    Route::get('/delete/slider/{id}' , 'DeleteSlider')->name('delete.slider');

});

// Banner All Route 
Route::controller(BannerController::class)->group(function(){
    Route::get('/all/banner' , 'AllBanner')->name('all.banner');
    Route::get('/add/banner' , 'AddBanner')->name('add.banner');
    Route::post('/store/banner' , 'StoreBanner')->name('store.banner');
    Route::get('/edit/banner/{id}' , 'EditBanner')->name('edit.banner');
    Route::post('/update/banner' , 'UpdateBanner')->name('update.banner');
    Route::get('/delete/banner/{id}' , 'DeleteBanner')->name('delete.banner');
});
// Deliver Ward All Route 
Route::controller(DeliverAreaController::class)->group(function(){
    Route::get('/all/ward' , 'AllWard')->name('all.ward');
    Route::get('/add/ward' , 'AddWard')->name('add.ward');
    Route::post('/store/ward' , 'StoreWard')->name('store.ward');
    Route::get('/edit/ward/{id}' , 'EditWard')->name('edit.ward');
    Route::post('/update/ward' , 'UpdateWard')->name('update.ward');
    Route::get('/delete/ward/{id}' , 'DeleteWard')->name('delete.ward');
});
// Deliver Township All Route 
Route::controller(DeliverAreaController::class)->group(function(){
    Route::get('/all/township' , 'AllTownship')->name('all.township');
    Route::get('/add/township' , 'AddTownship')->name('add.township');
    Route::post('/store/township' , 'StoreTownship')->name('store.township');
    Route::get('/edit/township/{id}' , 'EditTownship')->name('edit.township');
    Route::post('/update/township' , 'UpdateTownship')->name('update.township');
    Route::get('/delete/township/{id}' , 'DeleteTownship')->name('delete.township');
});
// Deliver Region All Route 
Route::controller(DeliverAreaController::class)->group(function(){
    Route::get('/all/region' , 'AllRegion')->name('all.region');
    Route::get('/add/region' , 'AddRegion')->name('add.region');
    Route::post('/store/region' , 'StoreRegion')->name('store.region');
    Route::get('/edit/region/{id}' , 'EditRegion')->name('edit.region');
    Route::post('/update/region' , 'UpdateRegion')->name('update.region');
    Route::get('/delete/region/{id}' , 'DeleteRegion')->name('delete.region');
});

// Admin Order All Route 
Route::controller(OrderController::class)->group(function(){
    Route::get('/pending/order' , 'PendingOrder')->name('pending.order');
    Route::get('/confirm/order' , 'ConfirmOrder')->name('confirm.order');
    Route::get('/process/order' , 'ProcessOrder')->name('process.order');
    Route::get('/deliver/order' , 'DeliverOrder')->name('deliver.order');
    Route::get('/cancel/order' , 'CancelOrderRequest')->name('cancel.order');
    Route::get('/admin/order/detail/{order_id}' , 'AdminOrderDetail')->name('admin.order.detail');
    Route::get('/pending/confirm/{order_id}' , 'PendingConfirm')->name('pending-confirm');
    Route::get('/confirm/process/{order_id}' , 'ConfirmProcess')->name('confirm-process');
    Route::get('/processing/deliver/{order_id}' , 'ProcessDeliver')->name('processing-deliver');
    Route::get('/process/cancel/request/{order_id}' , 'CancelRequest')->name('process-cancel-request');

});
//Return Order All Route 
Route::controller(ReturnController::class)->group(function(){
    Route::get('/return/request' , 'ReturnRequest')->name('return.request');
    Route::get('/return/request/approve/{order_id}' , 'ReturnRequestApprove')->name('return.request.approve');
    Route::get('/complete/return/request' , 'CompleteReturnRequest')->name('complete.return.request');

});

//Report All Route 
Route::controller(ReportController::class)->group(function(){
    Route::get('/report/view' , 'ReportView')->name('report.view');
    Route::post('/search/by/date' , 'SearchByDate')->name('search-by-date');
    Route::post('/search/by/month' , 'SearchByMonth')->name('search-by-month');
    Route::post('/search/by/year' , 'SearchByYear')->name('search-by-year');

    Route::get('/order/by/user' , 'OrderByUser')->name('order.by.user');
    Route::post('/search/by/user' , 'SearchByUser')->name('search-by-user');

});

}); //Admin End Middleware

// Product Details Frontend
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);

//Category Product Show in Frontend Header
Route::get('/product/category/{id}/{slug}', [IndexController::class, 'CategoryProduct']);
//SubCategory Product Show in Frontend Header
Route::get('/product/subcategory/{id}/{slug}', [IndexController::class, 'SubCategoryProduct']);
// Product View Modal With Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);
// Add to cart store data
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
// Add Data from mini Cart
Route::get('/product/mini/cart', [CartController::class, 'AddMiniCart']);
// Remove Data from mini Cart
Route::get('/minicart/product/remove/{rowId}', [CartController::class, 'RemoveMiniCart']);
// Add to cart data For Product Details Page 
Route::post('/details_cart/data/store/{id}', [CartController::class, 'AddToCartDetails']);
// Add to Wishlist 
Route::post('/add-to-wishlist/{product_id}', [WishlistController::class, 'AddToWishList']);
// Add to Compare 
Route::post('/add-to-compare/{product_id}', [CompareController::class, 'AddToCompare']);
//Show Total before check out
Route::get('/show-total', [CartController::class, 'ShowTotal']);

// Search All Route 
Route::controller(IndexController::class)->group(function(){

    Route::post('/search' , 'ProductSearch')->name('product.search');
    Route::post('/search-product' , 'SearchProduct'); 
    
   });



// User All Route
Route::middleware(['auth','role:user'])->group(function() {

    // Wishlist Route 
   Route::controller(WishlistController::class)->group(function(){
       Route::get('/wishlist' , 'AllWishlist')->name('wishlist');
       Route::get('/get-wishlist-product' , 'GetWishlistProduct');
       Route::get('/wishlist-remove/{id}' , 'WishlistRemove');
   
   }); 
   // Compare All Route 
Route::controller(CompareController::class)->group(function(){
    Route::get('/compare' , 'AllCompare')->name('compare');
    Route::get('/get-compare-product' , 'GetCompareProduct');
    Route::get('/compare-remove/{id}' , 'CompareRemove'); 
});

// Cart All Route 
Route::controller(CartController::class)->group(function(){
    Route::get('/mycart' , 'MyCart')->name('mycart');
    Route::get('/get-cart-product' , 'GetCartProduct');
    Route::get('/cart-remove/{rowId}' , 'CartRemove');
    Route::get('/cart-increment/{rowId}' , 'CartIncrement');
    Route::get('/cart-decrement/{rowId}' , 'CartDecrement');
    Route::get('/cart-count' , 'CartCheck');


}); 

// Checkout All Route 
Route::controller(CheckoutController::class)->group(function(){
    Route::get('/township-get/ajax/{ward_id}' , 'TownshipGetAjax');
    Route::get('/region-get/ajax/{township_id}' , 'RegionGetAjax');
    Route::post('/checkout/store' , 'CheckoutStore')->name('checkout.store');

}); 

// Checkout Page Route 
Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');

// CashOnDelivery All Route 
Route::controller(CashOnDeliveryController::class)->group(function(){
    Route::post('/cash/order' , 'CashOrder')->name('cash.order');



});

// AllUserController All Route 
Route::controller(AllUserController::class)->group(function(){
    Route::get('/user/account/page' , 'UserAccount')->name('user.account.page');
    Route::get('/user/change/password' , 'ChangePassword')->name('user.change.password');
    Route::get('/user/order/page' , 'OrderPage')->name('user.order.page');
    Route::get('/return/order/page' , 'ReturnOrderPage')->name('return.order.page');
    Route::get('/user/order_details/{order_id}' , 'UserOrderDetails');
    Route::post('/return/order/{order_id}' , 'ReturnOrder')->name('return.order');
});

Route::post('/orders/{id}/cancel', [OrderController::class, 'cancelOrder'])->name('orders.cancel');

   }); // End User group middleware