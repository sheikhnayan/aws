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
// ================User Section============

Route::get('config_cache', function(){
    Artisan::call('config:cache');
    return "Config-Cache is cleared";
});

Route::get('/','HomepageController@index');
Route::get('/About-us','HomepageController@About_us');
Route::get('/Term_Condition','HomepageController@Term_Condition');
Route::get('/Privacy_Policy','HomepageController@Privacy_Policy');
Route::get('/cookie-policy','HomepageController@cookie_policy');
Route::get('/purchasing-policy','HomepageController@purchasing_policy');
Route::get('/return-policy','HomepageController@return_policy');
Route::get('/seller-policy','HomepageController@seller_policy');
Route::get('/merchant-zone','HomepageController@merchant_zone');
Route::get('/seller-zone','HomepageController@seller_zone');
Route::get('/FAQ','HomepageController@FAQ');
Route::get('/Contact_us','HomepageController@Contact_us');
Route::get('/Hot_Deals','HomepageController@Hot_Deals');
Route::get('/Track_order','HomepageController@Track_order');
Route::get('/searchorder','HomepageController@searchorder');
Route::get('/exchange-policy','HomepageController@exchange_policy');

Route::get('/page_details/{slug}','HomepageController@page_details')->name('page_details');


Route::post('/submit-exchange-request','HomepageController@submit_exchange_request')->name('submit-exchange-request');

Route::get('/wishlist','CheckoutController@wishlist');
Route::post('/remove-from-wishlist','CheckoutController@remove_from_wishlist');

Route::get('/howtobuys','HomepageController@howtobuys');
Route::get('/privacy_policys','HomepageController@privacy_policys');


Route::get('/hugesaving','HomepageController@hugesaving');
Route::get('/ordersavemore','HomepageController@ordersavemore');
Route::get('/dicountoffer','HomepageController@dicountoffer');
Route::get('/buyget','HomepageController@buyget');
Route::get('/specialservices','HomepageController@specialservices');
Route::get('/Location','HomepageController@Location');


// New 
Route::get('/products','HomepageController@products');
Route::get('/searchallproduct','HomepageController@searchallproduct');
Route::get('/review','HomepageController@review');

Route::post('/submit-feedback','guestController@submit_feedback')->name('submit-feedback');


Route::post('/addpost', 'HomepageController@addpost')->middleware('guestauth');
Route::get('/allpost', 'HomepageController@allpost');



Route::get('/Discount-Mela','HomepageController@Dhamaka_offer');
Route::get('/Gadget-Mela','HomepageController@Gadget_Mela');
Route::get('/Lifestyle-Mela','HomepageController@Lifestyle_mela');
Route::get('/Deshi-Mela','HomepageController@Deshi_mela');



Route::get('/how-to-buy','HomepageController@howbuy');
Route::get('/COD','HomepageController@COD');
Route::get('/Easy-replacement','HomepageController@replacement');
Route::get('/Career','HomepageController@Career');
Route::post('/customer-message','HomepageController@customermessage');

Route::get('/all-product','HomepageController@shop');
Route::get('/seller','HomepageController@seller');
Route::get('/seller-Product/{brand}/{id}','HomepageController@sellerProduct');

Route::get('/offer','HomepageController@offer');
Route::get('/allcategory','HomepageController@allcategory');
Route::get('/Full-filled','HomepageController@Full_filled');
Route::get('/special-offer','HomepageController@special_offer');
Route::get('/exclusive-offer','HomepageController@exclusive_offer');
Route::get('/Best-sale','HomepageController@Best_sale');
Route::get('/Express-service','HomepageController@express_offer');
Route::get('/Flash-Sale','HomepageController@flash_offer');


Route::get('/newproduct-show','HomepageController@newproduct_show');
Route::get('/item/{name}/{id}','HomepageController@item_wise');
Route::get('/category/{name}/{id}','HomepageController@category_wise');
Route::get('/subcategory/{name}/{id}','HomepageController@subcategory_wise');
Route::get('/brand-list-info','HomepageController@brand_list_info');
Route::post('/search-brand-list','HomepageController@search_brand_list');
Route::get('/brand-product-info/{name}/{id}','HomepageController@brand_product_info')->name('brand_product');
Route::get('/product/{name}/{id}','HomepageController@single_product');

Route::get('/ittadi', function () {
    return redirect()->route('brand_product', ['name'=>'IttadiGranthoProkash','id' => 136]);
});

Route::get('/offer-category/{name}/{id}/{type}','HomepageController@dhamaka_offer_cat');
Route::get('/categorys/{name}/{id}','HomepageController@categorys_wise');
Route::get('/subcategorys/{name}/{id}','HomepageController@subcategorys_wise');


// ================Checkout System===============
Route::post('/add_to_cart','CheckoutController@add_to_cart');
Route::post('/buy_now','CheckoutController@buy_now');

Route::post('/shoppingcart_view','CheckoutController@shoppingcart_view');
Route::get('/totalprice','CheckoutController@totalprice');
Route::get('/totalcartqunt','CheckoutController@totalcartqunt');
Route::get('/totalcartamount','CheckoutController@totalcartamount');
Route::get('/totalcartamounts','CheckoutController@totalcartamounts');

Route::post('/add_to_wistlist','CheckoutController@add_to_wistlist');

Route::post('/placeorder_show','CheckoutController@placeorder_show');
Route::post('/delete_product','CheckoutController@delete_product');
Route::get('/Checkout','CheckoutController@Checkout_order');
Route::post('/district_charge','CheckoutController@zone_charge');
Route::post('/thana_info','CheckoutController@thana_info');
Route::post('/Applypromo_check','CheckoutController@Applypromo_check');
Route::post('/apply_redeem','CheckoutController@apply_redeem');
Route::post('/ordesystem','CheckoutController@ordesystem');

Route::post('/regular-order-system','CheckoutController@offline_ordersystem');
Route::get('/invoice-paper/{session}','CheckoutController@invoicepaper');

Route::get('/viewinvoice/{session}','CheckoutController@viewinvoice');


// Route::post('/payemnt-status','CheckoutController@payemnt_status');
Route::get('invoice-pdf/{session}','CheckoutController@invoicePDF');
Route::get('/make_payment/{invoice_id}','CheckoutController@make_payment');
Route::post('/make-payment-online','CheckoutController@make_payment_online');
Route::post('/make-payment-offline','CheckoutController@make_payment_offline');
Route::post('/reviewsadd','CheckoutController@reviewsadd');
// =============searching=================
Route::post('/proload-product','ProductController@proload_product');
Route::post('/Searchproduct','ProductController@Search_product');
Route::get('/searchproducts','HomepageController@searchproducts');
Route::post('/search-product-list','HomepageController@search_Product_List');
Route::post('/Getitemwiseproduct','HomepageController@Get_itemwiseproduct');
Route::post('/Getcatwiseproduct','HomepageController@Get_catwiseproduct');
Route::post('/Getsubcatwiseproduct','HomepageController@Get_subcatwiseproduct');
Route::post('/fetch_time','HomepageController@fetch_time');
// =============searching=================
Route::post('/brand_wise_search','ProductController@brandwisesearch');
Route::post('/price_wise_search','ProductController@pricewisesearch');
Route::post('/size_wise_search','ProductController@sizewisesearch');
Route::post('/color_wise_search','ProductController@colorwisesearch');



// Item
Route::post('/brand_wise_search_item','ProductController@brandwisesearch_item');
Route::post('/price_wise_search_item','ProductController@pricewisesearch_item');
Route::post('/size_wise_search_item','ProductController@sizewisesearch_item');
Route::post('/color_wise_search_item','ProductController@colorwisesearch_item');


// Category
Route::post('/brand_wise_search_category','ProductController@brandwisesearch_category');
Route::post('/price_wise_search_category','ProductController@pricewisesearch_category');
Route::post('/size_wise_search_category','ProductController@sizewisesearch_category');
Route::post('/color_wise_search_category','ProductController@colorwisesearch_category');

Route::post('/brand_wise_search_categorys','ProductController@brandwisesearch_categorys');


// Sub Category
Route::post('/brand_wise_search_subcategory','ProductController@brandwisesearch_subcategory');
Route::post('/price_wise_search_subcategory','ProductController@pricewisesearch_subcategory');
Route::post('/size_wise_search_subcategory','ProductController@sizewisesearch_subcategory');
Route::post('/color_wise_search_subcategory','ProductController@colorwisesearch_subcategory');

// Brand wise
Route::post('/brand_wise_search_brand','ProductController@brandwisesearch_brand');
Route::post('/price_wise_search_brand','ProductController@pricewisesearch_brand');
Route::post('/size_wise_search_brand','ProductController@sizewisesearch_brand');
Route::post('/color_wise_search_brand','ProductController@colorwisesearch_brand');


// ==============Login system===============

Route::resource('/user-Register','guestController');
Route::post('/guest-reg-otp','guestController@guest_reg_OTP');

Route::get('/guest-logins-otp','guestController@guest_logins_OTP');




Route::post('/guest-reg-otp-check','guestController@guest_reg_OTP_check');
Route::get('/user-login','guestController@userLogin');
Route::post('/guest-login','guestController@guestLogin');
Route::get('/forgot_password','guestController@forgot_password');
Route::post('/guest-forget','guestController@guest_forget');
Route::get('/guest_forget_code/{phone}','guestController@guest_forget_code');
Route::post('/guest_forget_code_check','guestController@guest_forget_code_check');
Route::post('/guest_forget_reset_done','guestController@guest_forget_reset_done');

Route::get('/user-login/facebook', 'guestController@redirectTofacebook');
Route::get('/user-login/facebook/callback', 'guestController@handleFacebookCallback');


Route::get('/user-login/twitter', 'guestController@redirectToTwitter');
Route::get('/user-login/twitter/callback', 'guestController@handleTwitterCallback');

Route::get('/user-login/google', 'guestController@redirectToGoogle');
Route::get('/user-login/google/callback', 'guestController@handleGoogleCallback');
Route::post('/guest-login-redirect','guestController@guestLogin_redirect');


// ===========Guest section=============
Route::group(['middleware' => 'guestauth'], function () {

Route::get('/userdashboard','guestController@userdashboard');
Route::get('/invoice-ordertrack/{session}','CheckoutController@invoice_ordertrack');
Route::post('/my-profile-update','guestController@myprofileupdate');
Route::get('/guest-logout','guestController@guestLogout');

Route::get('/allorder','guestController@allorder');
Route::get('/trackorder','guestController@trackorder');
Route::post('/tracking','guestController@tracking')->name('tracking');
Route::get('/updateinformation','guestController@updateinformation');
Route::post('/profileupdate','guestController@profileupdate');

Route::get('/changepassword','guestController@changepassword');

Route::post('/updatepassword','guestController@updatepassword');


Route::post('/profilechange','guestController@profilechange');







});

// =================seller Section================

Route::get('/seller-login','sellerController@sellerLogin');
Route::get('/seller-register','sellerController@sellerRegister');
Route::post('/seller-reg','sellerController@sellerReg');
Route::post('/seller-signin','sellerController@sellerSignin');


Route::get('/forgot_password_seller','sellerController@forgot_password_seller');
Route::post('/seller-forget','sellerController@seller_forget');
Route::get('/seller_forget_code/{phone}','sellerController@seller_forget_code');
Route::post('/seller_forget_code_check','sellerController@seller_forget_code_check');
Route::post('/seller_forget_reset_done','sellerController@seller_forget_reset_done');

Route::group(['middleware' => 'sellerauth'],function(){

Route::get('/seller-dashboard','sellerController@seller_dashboard');
Route::get('/seller-product-add','sellerController@sellerproductadd');
Route::post('/seller-product-insert','sellerController@store');
Route::get('/seller-product-view','sellerController@viewproduct');
Route::get('/sub-productedit/{id}','sellerController@sub_productedit');
Route::post('/sub-product-update/{id}','sellerController@subproductupdate');
Route::get('/sub-product-delete/{id}','sellerController@destroy');
Route::get('/total-ordered-peroduct','sellerController@totalorder');
Route::get('/seller-profile-setting','sellerController@profile_setting');
Route::post('/seller-profile-setting-update','sellerController@profile_setting_update');
Route::get('/seller-logout','sellerController@sellerLogout');


});


// ===========admin section=============

Route::get('/login','AdminController@Login');
Route::post('/Login-Admin','AdminController@LoginAdmin');

Route::post('CreateProductGetCategory','ProductController@categorylist');
Route::post('CreateProductGetsubCategory','ProductController@subcategorylist');


Route::group(['middleware' => 'adminauth'], function () {

Route::get('/create-admin','AdminController@index');
Route::get('/Admin-dashboard','AdminController@Dashboard');
Route::post('/insert-admin','AdminController@store');
Route::get('/view-admin','AdminController@show');
Route::get('/editadminModal/{id}','AdminController@editadminModal');
Route::post('/update-admin/{id}','AdminController@update');
Route::post('/inactive-status-admin','AdminController@inactivestatusadmin');
Route::post('/active-status-admin','AdminController@activestatusadmin');
Route::post('/delete-account-admin','AdminController@destroy');

//admin main menu
Route::get('MainMenu',
	['as'=>'MainMenu',
	'uses'=>'AdmainMenuCon@index'
	])->where(['MainMenu' => '[A-Z]+', 'MainMenu' => '[a-z]+']);

Route::get('AdminMainMenuModel/{id}','AdmainMenuCon@showDate');
Route::post('AdmainSaveMainlink','AdmainMenuCon@store');
Route::post('AdminEditMainlink','AdmainMenuCon@update');
Route::post('adminDeleteData/{id}','AdmainMenuCon@Dalete');

//admin sub menu
Route::get('SubMenu',
	['as'=>'SubMenu',
	'uses'=>'AdminSubMenuCon@index'
	])->where(['SubMenu' => '[A-Z]+', 'SubMenu' => '[a-z]+']);

Route::post('AdminSubLinkSave','AdminSubMenuCon@store');
Route::get('adminSubModelEdit/{id}','AdminSubMenuCon@showDate');
Route::post('AdminMainMenuEditcon','AdminSubMenuCon@update');
Route::post('AdminSubmenuDelete/{id}','AdminSubMenuCon@Dalete');
// ==============Item================

Route::resources([
	'item-add'=>'ItemController',
	'category-add'=>'categoryController',
	'sub-category-add'=>'subcategoryController',
	'brand-add'=>'CompanyController',
	'product-add'=>'ProductController',
	'flashdeal'=>'FlashDealController',
	'slider'=>'sliderController',
	'Explore'=>'exploreController',
	'CouponAdd'=>'couponController',
	'deliverychargeadd'=>'deliverychargeController',
	'color-info'=>'colorController',
	'size-info'=>'sizeController',
	'offer-setup'=>'OfferController',
	'district-add'=>'districtController',
	'thana-add'=>'ThanaController',
]);

Route::post('offer-setup-destroy','OfferController@destroy');

Route::get('set-up-offer-control','OfferController@setupoffer_control');
Route::post('updateoffercontrol','OfferController@updateoffercontrol');
Route::get('offer-setup-discount-mela','OfferController@offer_setup_discount_mela');
Route::get('offer-setup-life-style','OfferController@offer_setup_life_style');
Route::get('offer-setup-gadget-mela','OfferController@offer_setup_gadget_mela');
Route::get('offer-setup-deshi-mela','OfferController@offer_setup_deshi_mela');



Route::get('offer-setup-discount-mela-view','OfferController@offer_setup_discount_mela_view');

Route::get('offer-setup-life-style-view','OfferController@offer_setup_life_style_view');

Route::get('offer-setup-gadget-mela-view','OfferController@offer_setup_gadget_mela_view');

Route::get('offer-setup-deshi-mela-view','OfferController@offer_setup_deshi_mela_view');


Route::get('offer-banner-setup','OfferController@offer_banner');
Route::post('updateofferbanner','OfferController@updateofferbanner');


Route::post('product-add-destroy','ProductController@destroy');
Route::get('shippingclass','deliverychargeController@shippingclass');
Route::get('shippingclasscreate','deliverychargeController@shippingclasscreate');
Route::post('shippingclassstore','deliverychargeController@shippingclassstore');
Route::get('shippingclassedit/{id}','deliverychargeController@shippingclassedit');
Route::post('shippingclassupdate/{id}','deliverychargeController@shippingclassupdate');
Route::post('shippingclassdestroy/{id}','deliverychargeController@shippingclassdestroy');

// ========measurment ========
Route::get('Measurementadd','ProductController@Measurementadd');
Route::post('Measurementinsert','ProductController@Measurementinsert');
Route::get('Measurementedit/{id}','ProductController@Measurementedit');
Route::post('Measurementupdate/{id}','ProductController@Measurementupdate');
Route::get('Measurementdelete/{id}','ProductController@Measurementdelete');
Route::get('Measurementview','ProductController@Measurementview');
// ========Zone Add===========

Route::get('zone','deliverychargeController@Zone');
Route::get('deliveryzone','deliverychargeController@Zonecreate');
Route::post('zonecreated','deliverychargeController@Zonestore');
Route::get('zoneedit/{id}','deliverychargeController@Zoneedit');
Route::post('zoneupdate/{id}','deliverychargeController@Zoneupdate');
Route::post('zonedestroy/{id}','deliverychargeController@Zonedestroy');

// ========Zone District Add===========
Route::get('zonedistrict','deliverychargeController@zonedistrict');
Route::get('zonewisedistrict','deliverychargeController@Zonedistrictcreate');
Route::post('zonedistrictcreated','deliverychargeController@Zonedistrictstore');
Route::get('zonedistrictedit/{id}','deliverychargeController@Zonedistrictedit');
Route::post('zonedistrictupdate/{id}','deliverychargeController@Zonedistrictupdate');
Route::post('zonedistrictdestroy/{id}','deliverychargeController@Zonedistrictdestroy');



Route::get('view-review','ProductController@view_review');
Route::get('activereview/{id}','ProductController@activereview');
Route::get('inactivereview/{id}','ProductController@inactivereview');
Route::get('Deletereview/{id}','ProductController@deletereview');



Route::get('activeoffer/{id}','OfferController@activeoffer');
Route::get('inactiveoffer/{id}','OfferController@inactiveoffer');

Route::post('getProduct','ProductController@getProduct');
Route::get('productstatusactive/{id}','ProductController@productstatusactive');
Route::get('productstatusinactive/{id}','ProductController@productstatusinactive');
Route::post('productdetails','ProductController@productdetails');
Route::get('productimage','ProductController@product_image');
Route::post('multiimage','ProductController@multiimage');
Route::get('activecoupon/{id}','couponController@activecoupon');
Route::get('inactivecoupon/{id}','couponController@inactivecoupon');


// Stock

Route::get('/productstock', 'ProductController@productstock');
Route::post('addproductstock','ProductController@addproductstock');
Route::get('/viewproductstock', 'ProductController@viewproductstock');
Route::get('/deletestock/{id}','ProductController@deletestock');
Route::get('/editstock/{id}','ProductController@editstock');
Route::post('/updateproductstock/{id}','ProductController@updateproductstock');
Route::get('/stockreport','ProductController@stockreport');
Route::post('/getsize','ProductController@getsize');
Route::post('/getcolor','ProductController@getcolor');

Route::get('/deleteadminproduct/{id}','ProductController@deleteadminproduct');


Route::get('/deleteadminproduct/{id}','ProductController@deleteadminproduct');

Route::post('/update-multi-image','ProductController@update_multi_image')->name('admin/update-multi-image');
Route::get('/delete-multi-image/{id}','ProductController@delete_multi_image')->name('admin/delete-multi-image');



// other controller
Route::get('/admin/about_us','OtherController@about_us');
Route::post('/updateabout/{id}','OtherController@updateabout_us');

Route::get('/admin/term&condition','OtherController@term');
Route::post('/updateterm/{id}','OtherController@updateterm');

Route::get('/admin/privacy&policy','OtherController@privacy');
Route::post('/updateprivacy/{id}','OtherController@updateprivacy');

Route::get('/admin/cookie-policy','OtherController@cookie');
Route::post('/updatecookie/{id}','OtherController@updatecookie');

Route::get('/admin/purchasing-policy','OtherController@purchasing');
Route::post('/updatepurchasing/{id}','OtherController@updatepurchasing');

Route::get('/admin/return-policy','OtherController@return_policy');
Route::post('/updatereturn/{id}','OtherController@updatereturn');

Route::get('/admin/seller-policy','OtherController@seller_policy');
Route::post('/updateseller/{id}','OtherController@updateseller');

Route::get('/admin/merchant-zone','OtherController@merchant_zone');
Route::post('/updatemerchantzone/{id}','OtherController@updatemerchantzone');

Route::get('/admin/seller-zone','OtherController@seller_zone');
Route::post('/updatesellerzone/{id}','OtherController@updatesellerzone');

Route::get('/admin/faq','OtherController@faq');
Route::post('/updatefaq/{id}','OtherController@updatefaq');

Route::get('/admin/contact_us','OtherController@contact_us');
Route::post('/updatecontact_us/{id}','OtherController@updatecontact_us');

Route::get('/howtobuy','OtherController@howtobuy');
Route::post('/updatehowtobuy/{id}','OtherController@updatehowtobuy');


Route::get('/cash_on_delivery','OtherController@COD');
Route::post('/updatecod/{id}','OtherController@updatecod');


Route::get('customermessage','OtherController@customermessage');
Route::get('/customer-sms-delete/{id}','OtherController@customersmsdelete');


Route::get('setting','OtherController@setting');
Route::post('/updatesetting/{id}','OtherController@updatesetting');


Route::get('/CareerAdd','OtherController@CareerAdd');
Route::post('/updateCareerAdd/{id}','OtherController@updateCareerAdd');

Route::get('/announcementadd','OtherController@announcementadd');
Route::post('/insertannouncement','OtherController@insertannouncement');
Route::get('/newsadd','OtherController@newsadd');
Route::post('/insertnews','OtherController@insertnews');


// =========Registration Controller=============
Route::get('sellerlist','registrationListController@sellerlist');
Route::get('selleractivelist','registrationListController@selleractivelist');
Route::get('sellerinactivelist','registrationListController@sellerinactivelist');
Route::get('sellerdelete/{id}','registrationListController@sellerdelete');
Route::get('inactiveseller/{id}','registrationListController@inactiveseller');
Route::get('activeseller/{id}','registrationListController@activeseller');
Route::get('selleraccess/{phone}/{pass}','registrationListController@selleraccess');
Route::get('guestaccess/{id}','registrationListController@guestaccess');
Route::get('GuestList','registrationListController@GuestList');
Route::get('guestregister','registrationListController@guestregister');
Route::post('guestregisterstore','registrationListController@guestregisterstore');
Route::get('GuestListactive','registrationListController@GuestListactive');
Route::get('GuestListinactive','registrationListController@GuestListinactive');
Route::get('GuestListdelete/{id}','registrationListController@GuestListdelete');
Route::get('inactiveguest/{id}','registrationListController@inactiveguest');
Route::get('activeguest/{id}','registrationListController@activeguest');
// ===================Order System==================
Route::get('/payment-control','orderSystemController@payment_control');
Route::post('/updatecontrol','orderSystemController@updatecontrol');
Route::get('/date-to-date-order','orderSystemController@datetodateorder');
Route::post('/date-to-date-order-list','orderSystemController@datetodateorderlist');
Route::get('/search-order','orderSystemController@search_order');
// ==========Amarpay===============
Route::get('/amarpay','orderSystemController@amarpayorderreport');
Route::post('/amarpay-report-list','orderSystemController@amarpayreportlist');

Route::get('/foster-pay-order','orderSystemController@fosterpayorder');
Route::get('/allorderstatus','orderSystemController@allorderstatus');
Route::get('/totalOrder','orderSystemController@totalOrder');
Route::get('/pendingOrder','orderSystemController@pendingOrder');
Route::get('/ProcessOrder','orderSystemController@ProcessOrder');
Route::get('/Shipping-Order','orderSystemController@shippingorder');
Route::get('/onthewayOrder','orderSystemController@onthewayOrder');
Route::get('/CompleteOrder','orderSystemController@CompleteOrder');
Route::get('/RejectOrder','orderSystemController@RejectOrder');
Route::get('/Refound-Order','orderSystemController@RefoundOrder');

Route::get('/exchange-request','orderSystemController@exchange_request');
Route::get('/exchange_request_details/{id}','orderSystemController@exchange_request_details');
Route::post('/update-exchange-request/{id}','orderSystemController@update_exchange_request');
Route::get('/delete_exchange_request/{id}','orderSystemController@delete_exchange_request');

Route::get('/shipping_address/{id}','orderSystemController@shipping_address');
Route::post('/change_shipping','orderSystemController@change_shipping');
Route::get('/processorder_note/{id}','orderSystemController@processorder_note');
Route::get('/rejectorder_note/{id}','orderSystemController@rejectorder_note');
Route::post('/penToProOrder','orderSystemController@penToProOrder');
Route::post('/proToontheOrder','orderSystemController@proToontheOrder');
Route::post('/protoShipping','orderSystemController@protoShipping');
Route::post('/ontheTosuccOrder','orderSystemController@ontheTosuccOrder');
Route::post('/penTorejectOrder','orderSystemController@penTorejectOrder');
Route::post('/rejecttorefundOrder','orderSystemController@rejecttorefundOrder');
Route::get('/clearshopping','orderSystemController@clearshopping');



Route::get('/date-to-date-order-report','orderSystemController@order_report');
Route::post('/date-to-date-order-reporttab','orderSystemController@order_reporttab');

Route::get('/invoice-balance/{invoice}','orderSystemController@invoice_balance_sheet');
Route::get('/invoice-trans/{invoice}','orderSystemController@invoice_trans_sheet');

Route::get('/all-product-report','ProductController@all_product_report');

// ==========Delivery date===============
Route::get('/add-holyday','DeliveryDateController@index');
Route::post('/add-holyday/add','DeliveryDateController@add');
Route::post('/add-holyday/deleteholyday','DeliveryDateController@deleteholyday');
Route::get('/add-holyday/updateholyday/{id}','DeliveryDateController@updateholyday');
Route::post('/add-holyday/insertholyday','DeliveryDateController@insertholyday');


//============ SEO Setting ================
Route::resource('seosetting', SEOController::class);

//============ Page Setting ================
Route::resource('pagecategory', PageCategoryController::class);
Route::resource('page', PageController::class);


//============ Employee Setting ================
Route::resource('employee', EmployeeController::class);



//============ Paymethod Method ================
Route::resource('paymentmethod', PaymentMethodController::class);



// ==========Logout===============
Route::get('/Adminlogout','AdminController@Adminlogout');


});




Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('/schedule', function () {
            Artisan::call('product:pricechange');
            

             $notification=array(
            'messege'   =>'Flash Offer Off',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
        });


Route::get('/online-pay-order','orderSystemController@online_pay_order');
Route::get('/adminsearchproduct','ProductController@adminsearchproduct');
// Clear route cache:
 // Route::get('/route-cache', function() {
 //     $exitCode = Artisan::call('route:cache');
 //     return 'Routes cache cleared';
 // });

 // Clear config cache:
 // Route::get('/config-cache', function() {
 //     $exitCode = Artisan::call('config:cache');
 //     return 'Config cache cleared';
 // }); 


 // Clear view cache:
 // Route::get('/view-clear', function() {
 //     $exitCode = Artisan::call('view:clear');
 //     return 'View cache cleared';
 // });
