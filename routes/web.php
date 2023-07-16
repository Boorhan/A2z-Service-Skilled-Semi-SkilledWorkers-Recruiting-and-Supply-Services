<?php

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
//     return view('website.index');
// });

Auth::routes();

//website routes
Route::get('/', 'website\websiteMainController@index')->name('home');
Route::get('/home', 'website\websiteMainController@index')->name('home2');

//login,logout
Route::get('/login', 'website\userLoginController@showLoginForm')->name('login');
Route::post('/user/login/submit', 'website\userLoginController@userLogin')->name('userLogin.submit');
Route::get('/user/logout', 'website\userLoginController@userLogout')->name('user.logout');


//user registration
Route::get('/register', 'website\userLoginController@showRegForm')->name('register');
Route::post('/register/submit', 'website\userLoginController@userRegistration')->name('register.submit');

//service page
Route::get('/service/{slug}/{id}', 'website\websiteMainController@service')->name('service');
Route::get('/all-service', 'website\websiteMainController@allService')->name('webservice.all');
Route::get('/service-details/{slug}/{id}', 'website\websiteMainController@serviceDlt')->name('serviceDlt');

//book service
Route::get('/book-service/{slug}/{id}', 'website\userDashboardController@showOrderPage');
Route::post('/book-service/submit', 'website\userDashboardController@bookService')->name('order.submit');
Route::get('/booked-service', 'website\userDashboardController@bookServiceSuccess')->name('order.booked');

//user dashboard
Route::get('/user/dashboard', 'website\userDashboardController@userDashboard')->name('user.dashboard');
Route::get('/my-order-details/{slug}/{id}', 'website\userDashboardController@myOrderDlt')->name('myOrderDlt');
Route::get('/my-orders', 'website\userDashboardController@myOrders')->name('myOrders');
Route::get('cancel-user-order/{slug}/{id}', 'website\userDashboardController@cancelUserOrder');
Route::get('cancel-sp-order/{slug}/{id}', 'website\userDashboardController@cancelSpOrder');
Route::get('approve-sp-order/{slug}/{id}', 'website\userDashboardController@approveSpOrders');
Route::get('sp-staus-change-ongoing/{slug}/{id}', 'website\userDashboardController@changeSpStatusOngoing');
Route::get('sp-staus-change-complete/{slug}/{id}', 'website\userDashboardController@changeSpStatusComplete');

Route::get('sp-new-order-request', 'website\userDashboardController@spNewOrder')->name('spNewOrder');
Route::get('sp-pending-orders', 'website\userDashboardController@spPendingOrder')->name('spPendingOrder');
Route::get('sp-completed-orders', 'website\userDashboardController@spCompletedOrder')->name('spCompletedOrder');
Route::get('sp-payment-history', 'website\userDashboardController@spPaymentAll')->name('spPaymentAll');
//sp all canceled orders
Route::get('sp-canceled-orders', 'website\userDashboardController@spAllCanceledOrders')->name('spAllCanceledOrders');




//admin panel routes
Route::get('/admin/dashboard', 'Admin\DashboardController@showAdminDashboard')->name('dashboard');

//admin login
Route::get('/admin', 'Admin\LoginController@showAdminLoginForm')->name('admin.login');
Route::post('/admin/login/submit', 'Admin\LoginController@adminLogin')->name('login.submit');


//admin logout
Route::get('/admin/logout', 'Admin\LoginController@logoutAdmin')->name('admin.logout');


//admin reg
Route::get('/admin-reg', 'Admin\RegisterController@showAdminRegisterForm')->name('admin.reg');
Route::post('/admin/register/submit', 'Admin\RegisterController@createAdmin')->name('register.admin');
Route::get('/all-admins', 'Admin\RegisterController@getAllAdmins')->name('admin.all');
Route::get('block-admin/{id}', 'Admin\RegisterController@inactivateAdmin');
Route::get('active-admin/{id}', 'Admin\RegisterController@ActivateAdmin');


//service provider (user type == 1)
Route::get('/service-provider', 'Admin\ServiceProviderController@showSpRegForm')->name('sp.reg');
Route::post('/service-provider/submit', 'Admin\ServiceProviderController@createSP')->name('register.sp');
Route::get('/all-service-providers', 'Admin\ServiceProviderController@getAllSPs')->name('sp.all');
Route::get('block-sp/{id}', 'Admin\ServiceProviderController@inactivateSP');
Route::get('activate-sp/{id}', 'Admin\ServiceProviderController@ActivateSP');
Route::get('edit-sp/{id}', 'Admin\ServiceProviderController@getUpdateSPForm');
Route::post('sp/update/{id}', 'Admin\ServiceProviderController@UpdateSP');

Route::get('/category-wise-service-provider', 'Admin\ServiceProviderController@showCatWiseSpForm')->name('cat-wise-sp');
Route::post('/cat-wise-sp/submit', 'Admin\ServiceProviderController@createCatWiseSp')->name('cat-wise-sp.submit');
Route::get('/category-wise-all-service-providers', 'Admin\ServiceProviderController@getAllCatWiseSPs')->name('AllCatWiseSPs.all');
Route::get('delete-category-wise-service-provider/{id}', 'Admin\ServiceProviderController@deleteCatWiseSp');


//setup
Route::get('/admin/service-percentage-setup', 'Admin\ServiceController@servicePercentForm')->name('servicePercent');
Route::post('update-service-percentage/{id}', 'Admin\ServiceController@updateServicePercent');


//category
Route::get('/admin/category', 'Admin\CategoryController@showCategoryForm')->name('category');
Route::post('/admin/category/submit', 'Admin\CategoryController@createCategory')->name('category.submit');
Route::get('/admin/all-categories', 'Admin\CategoryController@getAllCategories')->name('category.all');
Route::get('delete-category/{id}', 'Admin\CategoryController@deleteCategory');
Route::get('edit-category/{id}', 'Admin\CategoryController@getUpdateCategoryForm');
Route::post('category/update/{id}', 'Admin\CategoryController@UpdateCategory');


//subcategory
Route::get('/admin/subcategory', 'Admin\SubCategoryController@showSubCategoryForm')->name('subcategory');
Route::post('/admin/subcategory/submit', 'Admin\SubCategoryController@createSubCategory')->name('subcategory.submit');
Route::get('/admin/all-subcategories', 'Admin\SubCategoryController@getAllSubCategories')->name('subcategory.all');
Route::get('delete-subcategory/{id}', 'Admin\SubCategoryController@deleteSubCategory');
Route::get('edit-subcategory/{id}', 'Admin\SubCategoryController@getUpdateSubCategoryForm');
Route::post('subcategory/update/{id}', 'Admin\SubCategoryController@UpdateSubCategory');


//services
Route::get('/admin/service', 'Admin\ServiceController@showAddServiceForm')->name('service');
Route::post('/admin/service/submit', 'Admin\ServiceController@createService')->name('service.submit');
Route::get('/all-services', 'Admin\ServiceController@allServices')->name('service.all');

Route::get('decline-service/{id}', 'Admin\ServiceController@declineService');
Route::get('approve-service/{id}', 'Admin\ServiceController@approveService');
Route::get('delete-service/{id}', 'Admin\ServiceController@deleteService');
Route::get('approved-service', 'Admin\ServiceController@getApprovedService')->name('approvedService.all');
Route::get('declined-service', 'Admin\ServiceController@getDeclinedService')->name('declinedService.all');



//orders
Route::get('order-details/{id}', 'Admin\OrderController@orderDetails')->name('order.details');
Route::get('pending-orders', 'Admin\OrderController@pendingOrders')->name('order.pending');
Route::get('processing-orders', 'Admin\OrderController@processingOrders')->name('order.processing');
Route::get('completed-orders', 'Admin\OrderController@completedOrders')->name('order.completed');
Route::get('user-canceled-orders', 'Admin\OrderController@userCanceledOrders')->name('user.canceled');
Route::get('admin-canceled-orders', 'Admin\OrderController@adminCanceledOrders')->name('admin.canceled');

Route::get('cancel-order/{id}', 'Admin\OrderController@cancelOrder');
Route::get('change-order-status/{id}', 'Admin\OrderController@orderStatusForm');
Route::post('change-order-status/update/{id}', 'Admin\OrderController@updateOrderStatus')->name('status.update');

Route::get('assign-sp/{id}', 'Admin\OrderController@assignSpForm');
Route::post('assign-sp/submit/{id}', 'Admin\OrderController@assignSP');


//payment
Route::get('/admin/payment', 'Admin\PaymentController@showPaymentForm')->name('payment');
Route::post('/admin/payment/submit', 'Admin\PaymentController@createPayment')->name('payment.submit');
Route::get('/admin/all-payments', 'Admin\PaymentController@getAllPayments')->name('payment.all');

//reports
Route::get('/admin/order-report', 'Admin\ReportController@orderReport')->name('order.report');
Route::get('/admin/earning-report', 'Admin\ReportController@earningReport')->name('earning.report');
Route::get('/admin/sp-earning-report', 'Admin\ReportController@spEarningReport')->name('sp.earning.report');
Route::get('/admin/payment-report', 'Admin\ReportController@paymentReport')->name('payment.report');
Route::get('/admin/due-report', 'Admin\ReportController@dueReport')->name('due.report');



//common routes for ajax data-----------------
Route::get('/ajax-get-subcat', 'Admin\ajaxGetDataController@getAjaxSubcat');
Route::get('/ajax-get-sp', 'Admin\ajaxGetDataController@getAjaxSP');
Route::get('/ajax-get-payment-dlt', 'Admin\ajaxGetDataController@getAjaxPaymentDtl');

// Route::group(['middleware' => 'auth:admin'], function () {
// Auth::routes();
// Route::view('/admin', 'admin');
// });