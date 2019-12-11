<?php

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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/index', 'ViewsController@view_index')->name('index');
Route::get('/about', 'ViewsController@view_about')->name('about');
Route::get('/contact', 'ViewsController@view_contact')->name('contact');
Route::get('/home', 'ViewsController@view_home')->name('home');
Route::get('/userlogin', 'CustLoginController@showLoginform')->name('userlogin');
Route::get('/userlogout', 'CustLoginController@logout')->name('userlogout');
Route::get('/profile', 'ViewsController@view_profile')->name('profile');
Route::post('/custlogin','CustLoginController@login')->name('custlogin');
Route::get('/userRegister', 'ViewsController@view_reg')->name('userRegister');
Route::get('/cart', 'ViewsController@view_cart')->name('cart');
Route::get('/ordersuccess', function () {
    return view('ordersuccess');
});
Route::get('/orderdetails', 'DetailsController@index')->name('orderdetails');
Route::get('/allorders', 'DetailsController@allorders')->name('allorders');
Route::get('/confirm/{id}', 'DetailsController@confirm')->name('confirm');


Route::resource('cart','CartController');
Route::resource('order','OrderController');
Route::resource('users','UsersController');
Route::resource('menu','MenuController');
Route::resource('addfood','FoodController');
Route::resource('employees','EmployeeController');