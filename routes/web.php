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


Route::get('/c', 'IndexController@test');
Route::get('/', 'IndexController@index');
Route::post('/restaurant', 'IndexController@restaurant');
Route::get('/restaurant', 'IndexController@listing');

Route::post('/complete','IndexController@complete');


Route::get('/members/json','IndexController@memberjson');
Route::get('/approx/cost/{memval}','IndexController@approxcost');
Auth::routes();


Route::post('/login', 'RoleController@check');

//Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix'=>'admin','middleware'=>'role'], function(){

Route::get('/', 'RoleController@index');
//Route::get('/','ItemController@index');

Route::group(['middleware'=>'shop'], function(){
//Category 
Route::get('/category','CategoryController@index');
Route::get('/category/list','CategoryController@table_list');
Route::get('/category/json','CategoryController@MakeJson');
Route::get('/category/{id}','CategoryController@show');
Route::post('/category/save','CategoryController@store');
Route::get('/category/drop/{id}','CategoryController@drop');


//Food 
Route::get('/items','ItemController@index');
Route::get('/items/list','ItemController@table_list');
Route::get('/items/json','ItemController@MakeJson');
Route::get('/items/{id}','ItemController@show');
Route::post('/items/save','ItemController@store');
Route::get('/items/drop/{id}','ItemController@drop');

//Recommend
Route::get('/item/recommend','ItemController@recommend');
Route::get('/item/list','ItemController@itemlist');
Route::post('/item/recommend/store','ItemController@recommendstore');
Route::get('/item/recommend/list/get','ItemController@recommendlist');
Route::get('/item/recommend','ItemController@recommend');


//orders 
Route::get('/orders','OrderController@index_order');
Route::get('/orders/list','OrderController@table_list_order');

Route::get('/party','OrderController@index_party');
Route::get('/party/list','OrderController@table_list_party');

Route::post('order/update','OrderController@order_update');
Route::get('/orders/{id}','OrderController@order_get');



//Packs
Route::get('/packs','ClientController@pointindex');
Route::get('/pax/list','ClientController@table_list');
Route::post('/pax/save','ClientController@pointstore');
Route::get('/pax/{id}','ClientController@show');
Route::get('/pax/drop/{id}','ClientController@drop');
});



//Shop Management
Route::get('/restaurant','RestaurantController@index');

Route::get('/restaurant/list','RestaurantController@shoplist');
Route::post('/restaurant/store','RestaurantController@store');
Route::get('/restaurant/drop/{id}','RestaurantController@drop');
Route::get('/restaurant/{id}','RestaurantController@show');
Route::get('/get/user/{id}','RestaurantController@getuser');
Route::get('/get/shop/{id}','RestaurantController@getshop');
Route::get('/settings','ClientController@index');
Route::post('/setting/store','ClientController@store');
Route::post('/setting/adminstore','ClientController@adminstore');
});


/** sub category **/ 
Route::get('subcategory','CategoryController@sub');

Route::get('/categoryjson','CategoryController@categoryjson');
Route::post('/orders','IndexController@orders');


//Party add cart
Route::post('/add/cart/{id}','ItemController@addcart');
