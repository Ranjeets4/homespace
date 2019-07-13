<?php

error_reporting(0);
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
Route::get('mail','website\indexController@mail');

Route::get('/','website\indexController@index');
Route::get('/about','website\aboutController@about');
Route::get('/contact','website\contactController@contact');
Route::any('/properties','website\propertiesController@properties');
Route::any('/propertytypes/{id}','website\propertiesController@propertytypes');

Route::get('/property-details/{id}','website\propertydetailsController@property_details');
Route::get('/login','website\loginController@login');
Route::get('/register','website\registerController@register');
Route::post('/login-check','website\loginController@login_check');
Route::post('/save','website\registerController@save');
Route::get('/logout','website\indexController@logout');
Route::get('/login/googlepage', 'Auth\LoginController@redirectToProvider');
Route::get('/login/redirectpage', 'Auth\LoginController@handleProviderCallback');

/*profile*/
Route::get('/profile','website\profileController@profile');
Route::get('/profile/edit/{id}','website\profileController@edit');
Route::get('/profile/change-password','website\profileController@password');
Route::get('/profile/save-profile','website\profileController@saveprofile');



/* Admin*/
Route::group(['middleware'=>'sessionValidate'],function(){

Route::get('admin/','website\admin\loginController@login');
Route::post('admin/','website\admin\loginController@login_check');
});
Route::group(['prefix'=>'admin/','middleware'=>'adminValidate'],function(){

/* Demo Routes */
Route::get('/add-demo','website\admin\DemoController@add');
Route::get('/view-demo','website\admin\DemoController@view');
Route::post('/save-demo','website\admin\DemoController@save');


Route::get('/dashboard','website\admin\indexController@index');
Route::get('/logout','website\admin\indexController@logout');
Route::get('/register','website\admin\registerController@register');

/*Location Routes*/
Route::get('/add-location/{id?}','website\admin\locationController@add');
Route::any('/view-location','website\admin\locationController@view');
Route::post('/save-location/{id?}','website\admin\locationController@save');
Route::get('/status-location/{id}/{value}','website\admin\locationController@status');

Route::get('/get-location/{id}','website\admin\locationController@getLocations');

/*Property Routes*/
Route::get('/add-property/{id?}','website\admin\propertyController@add');
Route::get('/view-property','website\admin\propertyController@view');
Route::post('/save-property/{id?}','website\admin\propertyController@save');
Route::get('/status-property/{id}/{value}','website\admin\propertyController@status');
Route::get('/delete-property/{id}','website\admin\propertyController@delete');

/*Property Type Routes*/
Route::get('/add-property-type/{id?}','website\admin\propertytypeController@add');
Route::get('/view-property-type','website\admin\propertytypeController@view');
Route::post('/save-property-type/{id?}','website\admin\propertytypeController@save');
Route::get('/status-property-type/{id}/{value}','website\admin\propertytypeController@status');
Route::get('/delete-property-type/{id}','website\admin\propertytypeController@delete');

/* Register*/
Route::get('/register','website\admin\registerController@register');
});

/* Razorpay*/
// Get Route For Show Payment Form
Route::get('paywithrazorpay/{id}/{amount}', 'website\RazorpayController@payWithRazorpay')->name('paywithrazorpay');
// Post Route For Make Payment Request
Route::post('payment/{pid?}', 'website\RazorpayController@payment')->name('payment');