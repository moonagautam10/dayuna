<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [SiteController::class, 'getWelcome'])->name('getWelcome');
Route::get('/v1', [SiteController::class, 'getHome'])->name('getHome');
Route::get('/shop/{productSlug}', [SiteController::class, 'getProductDetail'])->name('getProductDetail');
Route::get('/cart', [SiteController::class, 'getCart'])->name('getCart');
Route::post('/cartadd', [SiteController::class, 'postAddCart'])->name('postAddCart');
Route::get('/shop/catagory/{catagoryslug}', [SiteController::class, 'getProductByCatagory'])->name('getProductByCatagory');
Route::get('/shops/product/{type}', [SiteController::class, 'getProductByType'])->name('getProductByType');
Route::get('/shops/filter/product/{type}', [SiteController::class, 'postProductByType'])->name('postProductByType');
Route::get('/shoppingcart/delete/{cart}', [SiteController::class, 'getDeleteCart'])->name('getDeleteCart');
Route::get('/checkout', [SiteController::class, 'getCheckout'])->name('getCheckout');
Route::post('/order', [HomeController::class, 'postOrder'])->name('postOrder');
Route::get('/order/complate', [HomeController::class, 'getOrderComplate'])->name('getOrderComplate');


Route::get('/orders/', [HomeController::class, 'getUserOrder'])->name('getUserOrder');

// ajax
Route::get('/getshippingcost/{statusid}', [HomeController::class, 'postShippingCostAjax']);
Route::get('order/status/senangpay', [HomeController::class, 'getSenangpayStatus']);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'admin'], function(){
	Route::group(['middleware'=>'admin.guest'], function(){
		Route::get('login', [App\Http\Controllers\AdminController::class, 'loginForm'])->name('admin.login');
		Route::post('login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.auth');
	});
	Route::group(['middleware'=>'admin.auth'], function(){
		Route::get('/dashboard',[App\Http\Controllers\AdminController::class, 'getAdminDashboard'])->name('admin.home');
		// slider
		Route::get('/slider/manage', [App\Http\Controllers\SliderController::class, 'getSliderManage'])->name('getSliderManage');
		Route::get('/slider/delete/{slider}', [App\Http\Controllers\SliderController::class, 'getSliderDelete'])->name('getSliderDelete');
		Route::get('/slider/edit/{slider}', [App\Http\Controllers\SliderController::class, 'getSliderEdit'])->name('getSliderEdit');
		Route::post('/slider/add', [App\Http\Controllers\SliderController::class, 'postSliderAdd'])->name('postSliderAdd');
		Route::post('/slider/edit/{slider}', [App\Http\Controllers\SliderController::class, 'postSliderEdit'])->name('postSliderEdit');
		// catagory
		Route::get('/catagory/manage', [App\Http\Controllers\CatagoryController::class, 'getCatagoryManage'])->name('getCatagoryManage');
		Route::get('/catagory/edit/{catagory}', [App\Http\Controllers\CatagoryController::class, 'getCatagoryEdit'])->name('getCatagoryEdit');
		Route::get('/catagory/delete/{catagory}', [App\Http\Controllers\CatagoryController::class, 'getCatagoryDelete'])->name('getCatagoryDelete');
		Route::post('/catagory/add', [App\Http\Controllers\CatagoryController::class, 'postCatagoryAdd'])->name('postCatagoryAdd');
		Route::post('/catagory/edit/{catagory}', [App\Http\Controllers\CatagoryController::class, 'postCatagoryEdit'])->name('postCatagoryEdit');
		//product
		Route::get('/product/manage', [App\Http\Controllers\ProductController::class, 'getProductManage'])->name('getProductManage');
		Route::post('/product/add', [App\Http\Controllers\ProductController::class, 'postProductAdd'])->name('postProductAdd');
		Route::get('/product/edit/{product}', [App\Http\Controllers\ProductController::class, 'getProductEdit'])->name('getProductEdit');
		Route::post('/product/edit/{product}', [App\Http\Controllers\ProductController::class, 'postProductEdit'])->name('postProductEdit');
		Route::get('/product/delete/{product}', [App\Http\Controllers\ProductController::class, 'getDeleteProduct'])->name('getDeleteProduct');
		//Product Photo
		Route::get('/productphoto/manage/{product}', [App\Http\Controllers\ProductController::class, 'getProductPhotoAdd'])->name('getProductPhotoAdd');
		Route::post('/productphoto/manage/{productid}', [App\Http\Controllers\ProductController::class, 'postProductPhotoAdd'])->name('postProductPhotoAdd');
		Route::get('/productphoto/delete/{productphoto}', [App\Http\Controllers\ProductController::class, 'getProductPhotoDelete'])->name('getProductPhotoDelete');
		// product size photo
		Route::get('/product/size-photo/manage/{product}', [App\Http\Controllers\ProductController::class, 'getManageSizeColor'])->name('getManageSizeColor');
		Route::post('/product/size/add/{product}', [App\Http\Controllers\ProductController::class, 'postProductSizeAdd'])->name('postProductSizeAdd');
		Route::post('/product/color/add/{product}', [App\Http\Controllers\ProductController::class, 'postProductColorAdd'])->name('postProductColorAdd');
		Route::post('/product/size/add/{product}', [App\Http\Controllers\ProductController::class, 'postProductSizeAdd'])->name('postProductSizeAdd');
		Route::get('/product/size/delete/{size}', [App\Http\Controllers\ProductController::class, 'getDeleteProductSize'])->name('getDeleteProductSize');
		Route::get('/product/color/delete/{color}', [App\Http\Controllers\ProductController::class, 'getDeleteProductColor'])->name('getDeleteProductColor');
		// shipping
		Route::get('/shipping/manage', [App\Http\Controllers\ShippingController::class, 'getManageShipping'])->name('getManageShipping');
		Route::post('/shipping/manage', [App\Http\Controllers\ShippingController::class, 'postShippingAdd'])->name('postShippingAdd');
		Route::get('/shipping/delete/{shipping}', [App\Http\Controllers\ShippingController::class, 'getShippingDelete'])->name('getShippingDelete');
		Route::get('/shipping/edit/{shipping}', [App\Http\Controllers\ShippingController::class, 'getShippingEdit'])->name('getShippingEdit');
		Route::post('/shipping/edit/{shipping}', [App\Http\Controllers\ShippingController::class, 'postShippingEdit'])->name('postShippingEdit');
		Route::post('/order', [App\Http\Controllers\AdminController::class, 'getAdminOrder'])->name('getAdminOrder');

		Route::post('logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
	});
});
