<?php

use Illuminate\Support\Facades\Route;

// Test Pages
Route::get('/test', function () {
    return view('Temp/test');
});

// ******************************************** ( Seller Routes ) ******************************************************

// Login Links
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Seller Auth
Route::get('/login/seller', 'AuthSeller\LoginController@showSellerLoginForm')->name('sellerLog');
Route::post('/logout/seller', 'AuthSeller\LoginController@sellerLogout')->name('sellerLogout');
Route::get('/register/seller', 'AuthSeller\RegisterController@showSellerRegisterForm')->name('sellerRegister');
Route::post('/login/seller', 'AuthSeller\LoginController@sellerLogin')->name('sellerLogin');
Route::post('/register/seller', 'AuthSeller\RegisterController@createSeller')->name('sellerSave');


// Add Seller reset password routes
Route::group(['prefix' => 'sellers'], function(){
 //   Route::post('/password/email','Auth\CustomerForgotPasswordController@sendResetLinkEmail')->name('customer.password.email');
    route::get('/requestEmail', 'AuthSeller\ForgotPasswordController@showLinkRequestForm')->name('sellers.showEmailRequestForm');
    route::post('/sendEmail', 'AuthSeller\ForgotPasswordController@sendResetLinkEmail')->name('sellers.sendResetLink');
    route::get('/reset/{token}', 'AuthSeller\ResetPasswordController@showResetForm')->name('sellers.password.email');
    route::post('/reset', 'AuthSeller\ResetPasswordController@reset')->name('sellers.password.update');
});


// Control Panel
Route::get('/Seller-Panel', function () {
    return view('Seller.Panel');
})->middleware('IsSeller');

// ---------------Profile---------
// Profile
Route::get('/Seller-Profile', 'Seller\Basic@profile')->name('profile');

// CreditCard
Route::post('/Seller-CreditCard', 'Seller\Basic@CreditCard')->name('CreditCard');

// CreditCard
Route::get('/Seller-CreditCardActive/{id}', 'Seller\Basic@CreditCardActive');

// ---------Admin Connection------
// Admin Connection
Route::get('/Seller-AdminConnection', 'Seller\Basic@adminConnection')->name('adminConnection');

// Admin Connection Detail
Route::get('/Seller-AdminConnection-Detail/{id}/{status}', 'Seller\Basic@adminConnectionDetail')->name('adminConnectionDetail');

// Admin New Connection
Route::post('/Seller-AdminConnection-New', 'Seller\Basic@adminConnectionNew')->name('adminConnectionNew');

// Admin New Msg Connection
Route::post('/Seller-AdminConnection-NewMsg', 'Seller\Basic@adminConnectionNewMsg')->name('adminConnectionNewMsg');

// ---------Add Product-----------

Route::get('/Add-Product/{cat}', 'Seller\Add@AskSize')->name('AddProduct_askSize');

Route::get('/Add-Product', 'Seller\Add@AddProduct')->name('AddProduct');

Route::post('/Add-Product', 'Seller\Add@SaveProduct')->name('SaveProduct');

// ------------Store--------------

// Store
Route::get('/Seller-Store', 'Seller\Basic@store')->name('store');

// Delete Product
Route::get('/Seller-Delete-Product/{id}', 'Seller\Basic@deleteProduct');

// False Product
Route::get('/Seller-False-Product/{id}', 'Seller\Basic@falseProduct');

// Product Detail
Route::get('/Seller-Product-Detail/{id}', 'Seller\Basic@productDetail')->name('sellerProductDetail');

// Add Qty
Route::get('/Seller-AddQty/{id}/{val}', 'Seller\Basic@addQty')->name('sellerAddQty');

// ------------Sale--------------

// sale
Route::get('/Seller-Sale', 'Seller\Basic@sale')->name('sale');

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

// ----------------------------------------------End Seller Links-------------------------------------------------------



// *********************************************** ( Customer Routes ) *************************************************
// Master Page
Route::get('/', function () {
    return view('Customer.Master');
})->name('Master');

// Customer Product List
Route::get('/Customer-Product-List/{filter}', 'Customer\Basic@productList')->name('productList');

// Customer Product Detail
Route::get('/Customer-Product-Detail/{id}', 'Customer\Basic@productDetail')->name('productDetail');

// Customer Product Detail
Route::get('/Banking-Portal/{id}/{qty}', 'Customer\Basic@bankingPortal')->name('bankingPortal');

// Profile
Route::get('/Customer-Profile/{id}', 'Customer\Basic@userProfile')->name('userProfile');

Auth::routes();

// -------------------[ Ajax ]-----------------------
Route::get('/Customer-Product-LikeProduct/{id}/{val}', 'Customer\Basic@likeProduct');

Route::get('/Customer-Product-RatingProduct/{id}/{val}', 'Customer\Basic@ratingProduct');

Route::get('/Customer-Product-NewComment/{id}/{val}', 'Customer\Basic@productNewComment');

Route::get('/Customer-Product-LikeComment/{id}/{val}', 'Customer\Basic@LikeComment');

Route::get('/Customer-Product-UnlikeComment/{id}/{val}', 'Customer\Basic@unlikeComment');

Route::get('/Customer-Product-SizeInfo/{id}/{val}', 'Customer\Basic@sizeInfo');

Route::get('/Customer-Product-CallMe/{id}', 'Customer\Basic@productCallMeExist');

Route::get('/Customer-Product-CheckCallCustomer/{id}', 'Customer\Basic@checkCallCustomer');

Route::get('/Customer-Product-removeCallCustomer/{id}', 'Customer\Basic@removeCallCustomer');

Route::post('/Customer-Profile-Update', 'Customer\Basic@profileUpdate')->name('profileUpdate');

Route::get('/Customer-Address-Active/{id}', 'Customer\Basic@addressActive');

Route::post('/Customer-Address-Add', 'Customer\Basic@addAddress')->name('addAddress');

Route::post('/Customer-Address-Update', 'Customer\Basic@addressUpdate')->name('addressUpdate');

Route::get('/Customer-Address-Delete/{id}', 'Customer\Basic@addressDelete');

Route::post('/Customer-Product-Return', 'Customer\Basic@returnProduct')->name('returnProduct');

Route::get('/Customer-Cart', 'Customer\Basic@cart')->name('cart');

Route::get('/Customer-Cart-Delete/{id}', 'Customer\Basic@cartDelete');

Route::post('/Customer-Cart-Submit', 'Customer\Basic@cartSubmit')->name('cartSubmit');

Route::get('/Customer-Cart-Check/{id}', 'Customer\Basic@cartCheck');

Route::get('/Customer-Cart-Add/{id}', 'Customer\Basic@cartAdd');

Route::get('/Customer-Cart-CheckNumber', 'Customer\Basic@checkCartNumber');

// -------------------[ Products Filter ]-----------------------
Route::get('/Customer-Product-Custom-Filter/{filters}', 'Customer\Basic@productFilter');

Route::get('/email-test', function () {
    return view('vendor.mail.html.test');
});
