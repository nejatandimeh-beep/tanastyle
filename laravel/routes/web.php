<?php

use App\Http\Controllers\SitemapXmlController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
// Test Pages
Route::get('/test', 'Customer\Basic@test')->name('test');
// site map
Route::get('/SiteMap', 'SitemapController@index')->name('sitemap');
// ******************************************** ( Seller Routes ) ******************************************************
// Seller Auth
Route::get('/login/seller', 'AuthSeller\LoginController@showSellerLoginForm')->name('sellerLog');
Route::post('/logout/seller', 'AuthSeller\LoginController@sellerLogout')->name('sellerLogout');
Route::get('/register/seller', 'AuthSeller\RegisterController@showSellerRegisterForm')->name('sellerRegister');
Route::post('/register/seller-UploadImage', 'AuthSeller\RegisterController@uploadImage')->name('sellerRegisterImage');
Route::get('/check-seller-mobile', 'AuthSeller\VerifyController@getMobile')->name('getMobileSeller');
Route::post('/verify-seller-mobile', 'AuthSeller\VerifyController@verifyMobile')->name('verifyMobileSeller');
Route::post('/login/seller', 'AuthSeller\LoginController@sellerLogin')->name('sellerLogin');
Route::post('/register/seller/accept', 'AuthSeller\RegisterController@createSeller')->name('sellerSave');
// Seller Change Password Links
Route::get('change-seller-password', 'AuthSeller\ChangePasswordController@index')->name('changeSellerPass');
Route::post('change-seller-password', 'AuthSeller\ChangePasswordController@store')->name('changeSellerPassword');
// Add Seller reset password routes
Route::group(['prefix' => 'sellers'], function(){
 //   Route::post('/password/email','Auth\CustomerForgotPasswordController@sendResetLinkEmail')->name('customer.password.email');
    route::get('/requestMobile', 'AuthSeller\ForgotPasswordController@showLinkRequestForm')->name('sellers.showMobileRequestForm');
    route::post('/sendEmail', 'AuthSeller\ForgotPasswordController@sendResetLinkEmail')->name('sellers.sendResetLink');
    Route::post('/reset-seller-password', 'AuthSeller\ResetPasswordController@resetPassword')->name('sellerResetPassword');
    route::post('/reset', 'AuthSeller\ResetPasswordController@reset')->name('sellers.password.update');
});
// Control Panel
Route::get('/Seller-Panel', 'Seller\Basic@sellerPanel')->middleware('IsSeller');
// ---------------Profile---------
// Profile
Route::get('/Seller-Profile', 'Seller\Basic@profile')->name('profile');
// CreditCard
Route::post('/Seller-CreditCard', 'Seller\Basic@CreditCard')->name('CreditCard');
// CreditCard
Route::get('/Seller-CreditCardActive/{id}', 'Seller\Basic@CreditCardActive');
// ---------Admin Connection------
// Admin Connection
Route::get('/Seller-AdminConnection', 'Seller\Basic@AdminConnection')->name('adminConnection');
// Admin Connection Detail
Route::get('/Seller-AdminConnection-Detail/{id}/{status}', 'Seller\Basic@AdminConnectionDetail')->name('adminConnectionDetail');
// Admin New Connection
Route::post('/Seller-AdminConnection-New', 'Seller\Basic@AdminConnectionNew')->name('adminConnectionNew');
// Admin New Msg Connection
Route::post('/Seller-AdminConnection-NewMsg', 'Seller\Basic@AdminConnectionNewMsg')->name('adminConnectionNewMsg');
// ---------Add Product-----------
Route::get('/Add-Product/{cat}/{gender}', 'Seller\Add@AskSize')->name('AddProduct_askSize');
Route::get('/Add-Product', 'Seller\Add@AddProduct')->name('AddProduct');
Route::post('/Add-Product', 'Seller\Add@SaveProduct')->name('SaveProduct');
Route::post('/Add-Product-Upload-Image', 'Seller\Add@uploadImage')->name('sellerProductImage');
// ------------Store--------------
// Store
Route::get('/Seller-Store', 'Seller\Basic@store')->name('store');
// Delete Product
Route::get('/Seller-Delete-Product/{id}', 'Seller\Basic@deleteProduct');
// False Product
Route::get('/Seller-False-Product/{id}', 'Seller\Basic@falseProduct');
// Change Price Products
Route::get('/Seller-ChangePrice-Product/{id}/{unitPrice}/{finalPrice}/{discount}', 'Seller\Basic@changePriceProduct');
// Change Discount Product
Route::get('/Seller-ChangeDiscount-Product/{id}/{discount}/{finalPrice}/{unitPrice}', 'Seller\Basic@changeDiscountProduct');
// Product Detail
Route::get('/Seller-Product-Detail/{id}', 'Seller\Basic@productDetail')->name('sellerProductDetail');
// Add Qty
Route::get('/Seller-AddQty/{id}/{val}', 'Seller\Basic@addQty')->name('sellerAddQty');
// Dec Qty
Route::get('/Seller-DecQty/{id}/{val}', 'Seller\Basic@decQty')->name('sellerDecQty');
// ------------Sale--------------
// sale
Route::get('/Seller-Sale', 'Seller\Basic@sale')->name('sale');
// sale
Route::get('/Seller-Return-Product', 'Seller\Basic@return')->name('sellerReturn');
// Order Detail
Route::get('/Seller-Order-Detail/{addressId}/{id}', 'Seller\Basic@orderDetail')->name('sellerOrderDetail');
// ------------End Sale----------
// AmountReceived
Route::get('/Seller-AmountReceived', 'Seller\Basic@amountReceived')->name('amountReceived');
// Customer Comment
Route::get('/Seller-CustomerComment', 'Seller\Basic@customerComment')->name('customerComment');
// Customer Comment
Route::get('/Seller-productDelivery', 'Seller\Basic@productDelivery')->name('productDelivery');
//---------------AJAX---------------
// Live Search
Route::get('/Seller-Search-Product', 'Seller\Basic@liveSearch');
// Search Product Name-Gender-Status-Code-Rate
Route::get('/Seller-Search-Product/{id}/{val}', 'Seller\Basic@search_N_G_S_C_R');
// Search Product Price
Route::get('/Seller-Search-Product-Price/{id}/{valMin}/{valMax}', 'Seller\Basic@searchPrice');
// Search Product Date
Route::get('/Seller-Search-Product-Date/{id}/{startDate}/{endDate}', 'Seller\Basic@searchDate');
// SortVisit
Route::get('/Seller-Visit-Sort/{direction}', 'Seller\Basic@visit');
//------------------[ Regulation ]-----------------------------
Route::get('/Seller-Regulation/{tab}', 'Seller\Basic@regulation')->name('sellerRegulation');
// ----------------------------------------------End Seller Links-------------------------------------------------------

// ******************************************** ( Customer Routes ) ******************************************************
// Customer Login Links
Auth::routes(['verify' => true]);
//customer register links
Route::get('/request-customer-mobile/{source}', function ($source) {
    Session::put('source', $source);
    return view('auth.requestMobile',compact('source'));
})->name('requestMobile');
Route::get('/Login-Mode', 'Auth\LoginController@loginMode')->name('loginMode');
Route::get('/check-customer-mobile', 'Auth\VerifyController@getMobile')->name('checkMobile');
Route::post('verify-customer-mobile', 'Auth\VerifyController@verifyMobile')->name('verifyMobile');
Route::post('reset-password', 'Auth\ResetPasswordController@resetCustomerPassword')->name('mobileResetPassword');
// Customer Change Password Links with email
//Route::get('change-password', 'Auth\ChangePasswordController@index')->name('changePass');
//Route::post('change-password', 'Auth\ChangePasswordController@store')->name('change.password');
Route::get('/home', 'HomeController@index')->name('home');
// *********************************************** ( Customer Routes ) *************************************************
// Master Page
Route::get('/', 'Customer\Basic@Master')->name('Master');
// sign up all type of seller
Route::get('/Seller-Register-Mode', 'Customer\Basic@registerMode')->name('registerMode');
//-------------------[ Customer Product List ]-----------------------
Route::get('/Customer-Product-More/{cat}', 'Customer\Basic@moreItem')->name('moreItem');
Route::get('/Customer-Product-Female-List', 'Customer\Basic@productFemaleList')->name('productFemaleList');
Route::get('/Customer-Product-Female-Clothes-List', 'Customer\Basic@productFemaleClothesList')->name('productFemaleClothesList');
Route::get('/Customer-Product-Female-Shoes-List', 'Customer\Basic@productFemaleShoesList')->name('productFemaleShoesList');
Route::get('/Customer-Product-Female-Bags-List', 'Customer\Basic@productFemaleBagsList')->name('productFemaleBagsList');
Route::get('/Customer-Product-Female-Sports-List', 'Customer\Basic@productFemaleSportsList')->name('productFemaleSportsList');
Route::get('/Customer-Product-Female-Rhinestone-List', 'Customer\Basic@productFemaleRhinestoneList')->name('productFemaleRhinestoneList');
Route::get('/Customer-Product-Male-Clothes-List', 'Customer\Basic@productMaleClothesList')->name('productMaleClothesList');
Route::get('/Customer-Product-Male-Shoes-List', 'Customer\Basic@productMaleShoesList')->name('productMaleShoesList');
Route::get('/Customer-Product-Male-Bags-List', 'Customer\Basic@productMaleBagsList')->name('productMaleBagsList');
Route::get('/Customer-Product-Male-Sports-List', 'Customer\Basic@productMaleSportsList')->name('productMaleSportsList');
Route::get('/Customer-Product-Male-Rhinestone-List', 'Customer\Basic@productMaleRhinestoneList')->name('productMaleRhinestoneList');
Route::get('/Customer-Product-Male-List', 'Customer\Basic@productMaleList')->name('productMaleList');
Route::get('/Customer-Product-Girl-List', 'Customer\Basic@productGirlList')->name('productGirlList');
Route::get('/Customer-Product-Boy-List', 'Customer\Basic@productBoyList')->name('productBoyList');
Route::get('/Customer-Product-BabyGirl-List', 'Customer\Basic@productBabyGirlList')->name('productBabyGirlList');
Route::get('/Customer-Product-BabyBoy-List', 'Customer\Basic@productBabyBoyList')->name('productBabyBoyList');
Route::get('/Customer-Product-Search-List/{val}', 'Customer\Basic@productSearchList')->name('productSearchList');
Route::get('/Customer-Product-/{gender}/{cat}/{catCode}', 'Customer\Basic@product')->name('menuProduct');
// Customer Product Detail
Route::get('/Product/{id}/{size}', 'Customer\Basic@productDetail')->name('productDetail');
Route::get('/Customer-Product-Visit/{id}', 'Customer\Basic@productVisit')->name('productVisit');
// Banking portal
Route::get('/Banking-Portal/{id}/{qty}/{postPrice}/{FinalPriceWithoutDiscount}/{discount}/{finalPrice}/{unitPrice}', 'Customer\Basic@bankingPortal')->name('bankingPortal');
Route::get('/Customer-Verify', 'Customer\Basic@customerVerify')->name('customerVerify');
// Profile
Route::get('/Customer-Profile/{id}', 'Customer\Basic@userProfile')->name('userProfile');
Route::get('/Customer-Product-spacialSelling-List/{min}/{max}', 'Customer\Basic@spacialSelling')->name('spacialSelling');
Route::get('/Customer-Connection', 'Customer\Basic@connection')->name('customerConnection');
Route::get('/Customer-Connection-Detail/{id}/{status}', 'Customer\Basic@connectionDetail')->name('customerConnectionDetail');
Route::post('/Customer-Connection-New', 'Customer\Basic@connectionNew')->name('customerConnectionNew');
Route::post('/Customer-Connection-NewMsg', 'Customer\Basic@connectionNewMsg')->name('customerConnectionNewMsg');
// -------------------[ Ajax ]-----------------------
Route::get('/Customer-Product-Search/{val}', 'Customer\Basic@productSearch');
Route::get('/Customer-Product-LikeProduct/{id}/{idDetail}/{val}', 'Customer\Basic@likeProduct');
Route::get('/Customer-Product-RatingProduct/{id}/{idDetail}/{val}', 'Customer\Basic@ratingProduct');
Route::get('/Customer-Product-NewComment/{id}/{val}', 'Customer\Basic@productNewComment');
Route::get('/Customer-Product-LikeComment/{id}/{val}', 'Customer\Basic@LikeComment');
Route::get('/Customer-Product-UnlikeComment/{id}/{val}', 'Customer\Basic@unlikeComment');
Route::get('/Customer-Product-SizeInfo/{id}/{val}', 'Customer\Basic@sizeInfo');
Route::get('/Customer-Product-CallMe/{id}', 'Customer\Basic@productCallMeExist');
Route::get('/Customer-Product-CheckCallCustomer/{id}', 'Customer\Basic@checkCallCustomer');
Route::get('/Customer-Product-removeCallCustomer/{id}', 'Customer\Basic@removeCallCustomer');
Route::post('/Customer-Profile-Update', 'Customer\Basic@profileUpdate')->name('profileUpdate');
Route::get('/Customer-Address-Active/{id}', 'Customer\Basic@addressActive');
Route::get('/Customer-Address-Attach/{location}/{size}', 'Customer\Basic@attachAddress')->name('attachAddress');
Route::post('/Customer-Address-Add', 'Customer\Basic@addAddress')->name('addAddress');
Route::post('/Customer-Address-Update', 'Customer\Basic@addressUpdate')->name('addressUpdate');
Route::get('/Customer-Address-Delete/{id}', 'Customer\Basic@addressDelete');
Route::post('/Customer-Product-Return', 'Customer\Basic@returnProduct')->name('returnProduct');
Route::get('/Customer-Cart', 'Customer\Basic@cart')->name('cart');
Route::get('//Customer-Cart-Count', 'Customer\Basic@cartCount');
Route::get('/Customer-Cart-Delete/{id}', 'Customer\Basic@cartDelete');
Route::post('/Customer-Cart-Submit', 'Customer\Basic@cartSubmit')->name('cartSubmit');
Route::get('/Customer-Cart-Check/{id}', 'Customer\Basic@cartCheck');
Route::get('/Customer-Cart-Add/{id}', 'Customer\Basic@cartAdd');
//Route::get('/Customer-Cart-CheckNumber', 'Customer\Basic@checkCartNumber');
Route::get('/Customer-Cart-Qty-Check/{pdID}', 'Customer\Basic@cartQtyCheck');
Route::get('/About-Me', 'Customer\Basic@aboutMe')->name('aboutMe');
// -------------------[ Customer Feed ]-----------------------
Route::get('/Tanakora-Mahabad', 'Customer\Feed@feed')->name('feed');
Route::get('/Customer-Event-Reply/{eventID}/{val}', 'Customer\Feed@eventReply');
Route::get('/Customer-Event-Visit/{eventID}', 'Customer\Feed@eventVisit');
Route::get('/Customer-Event-Like/{eventID}/{status}', 'Customer\Feed@eventLike');
Route::get('/Customer-Event-Save/{eventID}/{status}', 'Customer\Feed@eventSave');
Route::get('/Customer-Send-Comment/{postID}/{text}/{replyID}/{sellerMajorID}', 'Customer\Feed@sendComment');
Route::get('/Customer-LikeComment/{id}/{replyID}/{status}/{likeStatus}', 'Customer\Feed@likeComments');
Route::get('/Customer-Load-Post/{sellerMajorID}', 'Customer\Feed@loadPost');
Route::get('/Customer-Like-Post/{postID}/{status}', 'Customer\Feed@likePost');
Route::get('/Customer-Save-Post/{postID}/{bookmark}', 'Customer\Feed@savePost');
Route::get('/Customer-Msg-Post/{postID}/{text}', 'Customer\Feed@postMsg');
Route::get('/Customer-Post-Visit/{postID}', 'Customer\Feed@postVisit');
Route::get('/Customer-AddComment/{postID}', 'Customer\Feed@addComments');
Route::get('/Customer-Comment-Delete/{id}/{status}', 'Customer\Feed@deleteComments');
Route::get('/Customer-Follow-SellerMajor/{sellerMajorID}', 'Customer\Feed@follow');
Route::get('/Customer-Following-SellerMajor', 'Customer\Feed@following')->name('sellerMajorFollowing');
Route::get('/Customer-Following-Delete/{sellerMajorID}', 'Customer\Feed@deleteFollowing');
Route::get('/Customer-SellerMajor-Panel/{id}', 'Customer\Feed@sellerMajorPanel')->name('cSmPanel');
Route::get('/Customer-SellerMajor-Reactions', 'Customer\Feed@reaction')->name('customerReaction');
Route::get('/Customer-SellerMajor-Messages', 'Customer\Feed@messages')->name('cSmMessages');
Route::get('/Customer-SellerMajor-Messages-Detail/{sellerMajorID}', 'Customer\Feed@messagesDetail')->name('cSmDetail');
Route::post('/Customer-SellerMajor-Messages-Answer', 'Customer\Feed@messagesAnswer')->name('cSmMessagesAnswer');
Route::get('/Customer-SellerMajor-Messages-Delete/{msgDetailID}', 'Customer\Feed@messagesDelete');
Route::get('/Customer-Seller-Major-UserMessages-Delete/{msgID}', 'Customer\Feed@userMsgDelete');
Route::get('/Customer-SellerMajor-Saved', 'Customer\Feed@saved')->name('cSmSaved');
// -------------------[ Products Filter [ Ajax ] ]-----------------------
Route::get('/Customer-Product-Custom-Filter/{gender}/{cat}/{size}/{priceMin}/{priceMax}/{color}/{filterChange}', 'Customer\Basic@productFilter');
Route::get('/Customer-Product-Load', 'Customer\Basic@productLoad');
Route::get('/Customer-Spacial-Discounts', 'Customer\Basic@discounts');
Route::get('/Customer-Similar-Products/{genderCode}/{catCode}/{productID}/{cat}', 'Customer\Basic@sameProduct');
// -------------------[ Cropper.js ]-----------------------
Route::post('/Customer-Profile-Image', 'Customer\Basic@uploadImage')->name('uploadImage');

Route::get('/email-test', function () {
    return view('vendor.mail.html.test');
});
//------------------[ Regulation ]-----------------------------
Route::get('/Customer-Regulation/{tab}', 'Customer\Basic@regulation')->name('regulation');

// *********************************************** ( Delivery Routes ) *************************************************
Route::get('/Delivery-Personal', 'Delivery\Basic@deliveryPersonal')->name('deliveryPersonal');
Route::get('/Delivery-Panel', 'Delivery\Basic@deliveryPanel')->name('deliveryPanel');
Route::post('/Delivery-Panel-DeliveryCourier/{orderDetailID}/{destination}', 'Delivery\Basic@deliveryCourier')->name('deliveryCourier');
Route::post('/Delivery-Panel-ReturnCourier/{orderDetailID}/{destination}', 'Delivery\Basic@returnCourier')->name('returnCourier');
// *********************************************** ( Kiosk Routes ) *************************************************
Route::get('/Kiosk-Personal', 'Delivery\Basic@kioskPersonal')->name('kioskPersonal');
Route::get('/Kiosk-Panel', 'Delivery\Basic@kioskPanel')->name('kioskPanel');
Route::get('/Kiosk-Check-Signature/{pass}', 'Delivery\Basic@kioskCheckPass');
Route::get('/Seller-Check-Signature/{pass}/{id}', 'Delivery\Basic@sellerCheckPass');
Route::get('/Destination-Add-Product/{orderDetailID}/{table}/{id}/{destination}', 'Delivery\Basic@destinationAddProduct');
Route::get('/Destination-Final/{orderDetailID}/{table}/{destination}/{trackingCode}', 'Delivery\Basic@destinationFinal');
Route::get('/Delivery-CourierRequest/{orderDetailID}', 'Delivery\Basic@courierRequest');
Route::get('/Return-CourierRequest/{orderDetailID}', 'Delivery\Basic@returnCourierRequest');

// *********************************************** ( Admin Routes ) *************************************************
// Seller Auth(login-logout-register)
Route::get('/login/admin', 'AuthAdmin\LoginController@showAdminLoginForm')->name('adminLog');
Route::post('/logout/admin', 'AuthAdmin\LoginController@adminLogout')->name('adminLogout');
Route::get('/register/admin', 'AuthAdmin\RegisterController@showAdminRegisterForm')->name('adminRegister');
Route::post('/login/admin', 'AuthAdmin\LoginController@adminLogin')->name('adminLogin');
Route::post('/register/admin', 'AuthAdmin\RegisterController@createAdmin')->name('adminSave');
// Seller Change Password Links
Route::get('/change-admin-password', 'AuthAdmin\ChangePasswordController@index')->name('changeAdminPass');
Route::post('/change-admin-password', 'AuthAdmin\ChangePasswordController@store')->name('changeAdminPassword');
// Add Seller reset password routes
Route::group(['prefix' => 'admins'], function() {
    //   Route::post('/password/email','Auth\CustomerForgotPasswordController@sendResetLinkEmail')->name('customer.password.email');
    route::get('/requestEmail', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admins.showEmailRequestForm');
    route::post('/sendEmail', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admins.sendResetLink');
    route::get('/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admins.password.email');
    route::post('/reset', 'AuthAdmin\ResetPasswordController@reset')->name('admins.password.update');
});
Route::get('/Administrator-Master', 'Administrator\Admin@AdministratorMaster')->name('administratorMaster');
Route::get('/Administrator-Kiosk-SignatureEdit/{newCode}/{id}', 'Delivery\Basic@signatureEdit');
// -------------------------[seller]
Route::post('/Seller-Register-Request', 'AuthSeller\RegisterController@new')->name('sellerNew');
Route::post('/Seller-Delete-Request', 'Administrator\Seller@delete')->name('sellerDelete');
Route::get('/Administrator-Seller-Verify', 'Administrator\Seller@verify')->name('sellerVerify');
Route::get('/Administrator-Seller-DetailVerify/{id}', 'Administrator\Seller@verifyDetail')->name('sellerVerifyDetail');
Route::get('/Administrator-Seller', 'Administrator\Seller@list')->name('sellerList');
Route::get('/Administrator-Seller-Control/{id}/{tab}', 'Administrator\Seller@controlPanel')->name('sellerControlPanel');
Route::get('/Administrator-Seller-ProductDetail/{id}', 'Administrator\Seller@productDetail')->name('adminSellerProductDetail');
Route::post('/Administrator-Seller-Update', 'Administrator\Seller@update')->name('updateSeller');
Route::get('/Administrator-Seller-Search/{nationalId}', 'Administrator\Seller@nationalIdSearch');
Route::get('/Administrator-Seller-CreditCardActive/{sellerId}/{cardID}', 'Administrator\Seller@creditCardActive')->name('creditCardActive');
Route::get('/Administrator-Seller-OrderDetail/{addressId}/{id}', 'Administrator\Seller@orderDetail')->name('adminOrderDetail');
Route::get('/Administrator-Seller-ConnectionDetail/{id}/{status}', 'Administrator\Seller@connectionDetail')->name('connectionDetail');
Route::post('/Administrator-Seller-ConnectionNew', 'Administrator\Seller@connectionNew')->name('connectionNew');
Route::post('/Administrator-Seller-ConnectionNewMsg', 'Administrator\Seller@connectionNewMsg')->name('connectionNewMsg');
Route::post('/Administrator-Seller-AmountPay', 'Administrator\Seller@amountPay')->name('amountPay');
Route::get('/Administrator-Seller-Support', 'Administrator\Seller@support')->name('support');
Route::get('/Administrator-Seller-store/{id}', 'Administrator\Seller@store')->name('adminSellerStore');
Route::get('/Administrator-Seller-sale/{id}', 'Administrator\Seller@sale')->name('adminSellerSale');
Route::get('/Administrator-Seller-Return/{id}', 'Administrator\Seller@return')->name('adminSellerReturn');

//-----------------------------[seller][filtering]
// -------------------------[Product]
Route::get('/Administrator-Product-List', 'Administrator\Product@delivery')->name('adminProductDelivery');
Route::get('/Administrator-Product-Detail/{id}', 'Administrator\Product@productDetail')->name('adminProductDetail');
Route::post('/Administrator-Product-Edit', 'Administrator\Seller@productEdit')->name('adminProductEdit');
Route::get('/Administrator-Product-Delete/{id}/{sellerId}', 'Administrator\Seller@productDelete')->name('adminProductDelete');
Route::get('/Administrator-Product-False/{id}/{sellerId}', 'Administrator\Seller@productFalse')->name('adminProductFalse');
Route::get('/Administrator-Product-OrderDetail/{addressId}/{id}', 'Administrator\Product@orderDetail')->name('adminProductOrderDetail');
Route::get('/Administrator-Product-Store', 'Administrator\Product@store')->name('adminProductStore');
Route::get('/Administrator-Product-Sale', 'Administrator\Product@sale')->name('adminProductSale');
Route::get('/Administrator-Product-Return', 'Administrator\Product@return')->name('adminProductReturn');
// -------------------------[Customer]
Route::get('/Administrator-Customer-List', 'Administrator\Customer@customer')->name('customerList');
Route::get('/Administrator-Customer-Support', 'Administrator\Customer@support')->name('customerSupport');
Route::get('/Administrator-Customer-Control/{id}/{tab}', 'Administrator\Customer@controlPanel')->name('customerControlPanel');
Route::post('/Administrator-Customer-Update', 'Administrator\Customer@update')->name('updateCustomer');
Route::get('/Administrator-Customer-Search/{mobile}', 'Administrator\Customer@mobileSearch');
Route::post('/Administrator-Customer-AddressUpdate', 'Administrator\Customer@addressUpdate')->name('adminAddressUpdate');
Route::post('/Administrator-Customer-AddressAdd', 'Administrator\Customer@addAddress')->name('customerAddAddress');
Route::get('/Administrator-Customer-AddressDelete/{id}', 'Administrator\Customer@addressDelete');
Route::get('/Administrator-Customer-OrderDetail/{addressId}/{id}', 'Administrator\Customer@orderDetail')->name('adminCustomerOrderDetail');
Route::get('/Administrator-Customer-ConnectionDetail/{id}/{status}', 'Administrator\Customer@connectionDetail')->name('adminCustomerConnectionDetail');
Route::post('/Administrator-Customer-Connection-NewMsg', 'Administrator\Customer@connectionNewMsg')->name('adminCustomerConnectionNewMsg');
Route::get('/Administrator-Customer-Sale/{id}', 'Administrator\Customer@sale')->name('adminCustomerSale');
Route::get('/Administrator-Customer-Return/{id}', 'Administrator\Customer@return')->name('adminCustomerReturn');
// -------------------------[Delivery]
Route::get('/Administrator-Delivery-Panel/{id}', 'Administrator\Admin@adminDeliveryPanel')->name('adminDeliveryPanel');
Route::get('/Administrator-Kiosk-Panel/{id}', 'Administrator\Admin@adminKioskPanel')->name('adminKioskPanel');
// -------------------------[Post]
Route::get('/Administrator-Post-Panel', 'Administrator\Admin@postPanel')->name('postPanel');
Route::get('/Administrator-TrackingCode-Search/{trackingCode}', 'Administrator\Admin@trackingCodeSearch');
// -------------------------[instagram]
Route::get('/Instagram', 'Customer\Basic@instagram')->name('instagram');
Route::post('/Instagram-Request-PdId', 'Customer\Basic@requestPdId')->name('requestPdId');

// *********************************************** ( Bank Routes ) *************************************************
Route::post('/Payment-Status', 'Customer\Basic@paymentStatus')->name('paymentStatus');
//Route::get('/samanTest', 'Customer\Basic@samanTest')->name('samanTest');
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    echo 'route-clear: ok';
});
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    echo 'config-cache: ok';
});
Route::get('/cache-clear', function() {
    $exitCode = Artisan::call('cache:clear');
    echo 'cache-clear: ok';
});
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    echo 'route:cache: ok';
});
Route::get('/config-clear', function() {
    $exitCode = Artisan::call('config:clear');
    echo 'config:clear: ok';
});
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    echo 'optimize: ok';
});
Route::get('/migrate', function() {
    $exitCode = Artisan::call('migrate');
    echo 'migrate: ok';
});
Route::get('/session-table', function() {
    $exitCode = Artisan::call(' session:table');
    echo 'table create: ok';
});

// -----------------------------[zarinpal]--------------------------------
Route::get('/Confirmation','Customer\Basic@orderZarinpal');

// *********************************************** ( sellerMajor Routes ) *************************************************
// Seller Auth(login-logout-register)
Route::get('/request-sellerMajor-mobile/{source}', function ($source) {
    Session::put('source', $source);
    return view('auth.sellerMajorAuth.requestMobile',compact('source'));
})->name('requestSellerMajorMobile');
Route::get('/login/sellerMajor-login-Mode', 'Customer\Basic@sellerLoginMode')->name('sellerLoginMode');
Route::get('/login/sellerMajor-login-plan-Mode', 'Customer\Basic@sellerLoginPlanMode')->name('sellerLoginPlanMode');
Route::get('/login/sellerMajor', 'AuthSellerMajor\LoginController@loginForm')->name('sellerMajorLog');
Route::post('/logout/sellerMajor', 'AuthSellerMajor\LoginController@logout')->name('sellerMajorLogout');
Route::get('/register/sellerMajor', 'AuthSellerMajor\RegisterController@registerForm')->name('sellerMajorRegister');
Route::post('/login/sellerMajor', 'AuthSellerMajor\LoginController@login')->name('sellerMajorLogin');
Route::post('/register/sellerMajor', 'AuthSellerMajor\RegisterController@create')->name('sellerMajorSave');
Route::post('/verify-sellerMajor-mobile', 'AuthSellerMajor\VerifyController@verifyMobile')->name('verifySellerMajorMobile');
Route::post('/reset-sellerMajor-password', 'AuthSellerMajor\ResetPasswordController@resetPassword')->name('sellerMajorMobileResetPassword');
// Seller Change Password Links
Route::get('/change-sellerMajor-password', 'AuthSellerMajor\ChangePasswordController@index')->name('changeSellerMajorPass');
Route::post('/change-sellerMajor-password', 'AuthSellerMajor\ChangePasswordController@store')->name('changeSellerMajorPassword');
// Add Seller reset password routes
Route::group(['prefix' => 'sellersmajor'], function() {
    //   Route::post('/password/email','Auth\CustomerForgotPasswordController@sendResetLinkEmail')->name('customer.password.email');
    route::get('/requestEmail', 'AuthSellerMajor\ForgotPasswordController@showLinkRequestForm')->name('sellersmajor.showEmailRequestForm');
    route::post('/sendEmail', 'AuthSellerMajor\ForgotPasswordController@sendResetLinkEmail')->name('sellersmajor.sendResetLink');
    route::get('/reset/{token}', 'AuthSellerMajor\ResetPasswordController@showResetForm')->name('sellersmajor.password.email');
    route::post('/reset', 'AuthSellerMajor\ResetPasswordController@reset')->name('sellersmajor.password.update');
});
// add image profile
Route::post('/sellerMajor/profile/image', 'AuthSellerMajor\RegisterController@uploadImage')->name('sellerMajorProfileImage');
Route::post('/SellerMajor-Register-Request', 'AuthSellerMajor\RegisterController@createSeller')->name('sellerMajorNew');
Route::get('/check-SellerMajor-mobile', 'AuthSellerMajor\VerifyController@checkMobile')->name('checkMobileSellerMajor');
//SellerMajor Self route
Route::get('/Seller-Major-Panel', 'SellerMajor\Basic@panel')->middleware('IsSellerMajor')->name('sellerMajorPanel');
Route::get('/Seller-Major-bioUpdate/{bioText}', 'SellerMajor\Basic@bioUpdate');
Route::get('/Seller-Major-addressUpdate/{address}', 'SellerMajor\Basic@addressUpdate');
Route::get('/Seller-Major-instagramUpdate/{instagramLink}', 'SellerMajor\Basic@instagramUpdate');
Route::post('/Seller-Major-profileImgUpdate', 'SellerMajor\Basic@updateProfileImage')->name('sellerMajorEditProfileImg');
Route::get('/Seller-Major-profileImgRemove', 'SellerMajor\Basic@removeProfileImage')->name('sellerMajorRemoveProfileImg');
Route::post('/Seller-Major-addEvent', 'SellerMajor\Basic@addEvent')->name('sellerMajorAddEvent');
Route::get('/Seller-Major-removeEvent/{item}', 'SellerMajor\Basic@removeEvent')->name('sellerMajorRemoveEvent');
Route::get('/Seller-Major-Messages', 'SellerMajor\Basic@messages')->name('sellerMajorMessages');
Route::post('/Seller-Major-Messages-Detail', 'SellerMajor\Basic@messagesDetail')->name('sellerMajorMessagesDetail');
Route::post('/Seller-Major-Messages-Answer', 'SellerMajor\Basic@messagesAnswer')->name('sellerMajorMessagesAnswer');
Route::get('/Seller-Major-Messages-Delete/{msgDetailID}', 'SellerMajor\Basic@messagesDelete');
Route::get('/Seller-Major-UserMessages-Delete/{msgID}', 'SellerMajor\Basic@userMsgDelete');
Route::get('/Seller-Major-Send-Comment/{postID}/{text}/{replyID}', 'SellerMajor\Basic@sendComment');
Route::post('/Seller-Major-addPost', 'SellerMajor\Basic@addPost')->name('sellerMajorAddPost');
Route::get('/Seller-Major-addPostForm', 'SellerMajor\Basic@addPostForm')->name('sellerMajorAddPostForm');
Route::post('/Seller-Major-Edit-Post', 'SellerMajor\Basic@editPost');
Route::get('/Seller-Major-Load-Post', 'SellerMajor\Basic@loadPost');
Route::get('/Seller-Major-Like-Post/{postID}/{status}', 'SellerMajor\Basic@likePost');
Route::get('/Seller-Major-Chart-Post/{postID}', 'SellerMajor\Basic@chartPost');
Route::get('/Seller-Major-Delete-Post/{postID}', 'SellerMajor\Basic@deletePost');
Route::get('/Seller-Major-AddComment/{postID}', 'SellerMajor\Basic@addComments');
Route::get('/Seller-Major-Comment-Delete/{id}/{status}', 'SellerMajor\Basic@deleteComments');
Route::get('/Seller-Major-LikeComment/{id}/{replyID}/{status}/{likeStatus}', 'SellerMajor\Basic@likeComments');
Route::get('/Seller-Major-Reactions', 'SellerMajor\Basic@reaction')->name('sellerMajorReaction');
Route::post( '/Seller-Major-uploadImage', 'SellerMajor\Basic@uploadImage');
