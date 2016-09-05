<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'StoreController@index');
Route::get('/product-categories/{id}' ,['as' => 'store.product_categories.products', 'uses' => 'StoreController@product_category']);

Route::get('home', 'HomeController@index');
Route::get('category/{id}', ['as' => 'store.category', 'uses'=>'StoreController@category']);
Route::get('product/{id}', ['as' => 'store.product', 'uses'=>'StoreController@product']);



Route::get('cart',                  ['as'=> 'store.cart', 'uses'=>'CartController@index']);
Route::get('cart/add/{id}',         ['as'=> 'store.cart.add', 'uses'=>'CartController@add']);
Route::get('cart/destroy/{id}',     ['as'=> 'store.cart.destroy', 'uses'=>'CartController@destroy']);
Route::put('cart/update/{id}',      ['as' => 'store.cart.update', 'uses' => 'CartController@update']);


Route::get('checkout/placeOrder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);

Route::group(['prefix'=>'admin', 'middleware' => 'auth'], function(){

	Route::group(['prefix' => 'categories/'], function(){
		//categories
		Route::get(''             ,['as' => 'admin.categories.index', 'uses' => 'AdminCategoriesController@index']);
		Route::get('show/{id}'    ,['as' => 'admin.categories.show',  'uses' => 'AdminCategoriesController@show']);
		Route::get('create'       ,['as'=>  'admin.categories.create','uses'=>'AdminCategoriesController@create']);
		Route::post('store'       ,['as'=>  'admin.categories.store','uses'=>'AdminCategoriesController@store']);
		Route::get('edit/{id}'    ,['as'=>  'admin.categories.edit','uses'=>'AdminCategoriesController@edit']);
		Route::put('update/{id}'  ,['as'=>  'admin.categories.update','uses'=>'AdminCategoriesController@update']);
		Route::get('destroy/{id}' ,['as'=>  'admin.categories.destroy','uses'=>'AdminCategoriesController@destroy']);
	});

	Route::group(['prefix' => 'products'], function(){
		//products
		Route::get(''             ,['as' => 'admin.products.index',  'uses' => 'AdminProductsController@index']);
		Route::get('show/{id}'    ,['as' => 'admin.products.show',   'uses' => 'AdminProductsController@show']);
		Route::get('create'       ,['as'=>  'admin.products.create', 'uses'=>  'AdminProductsController@create']);
		Route::post('store'       ,['as'=>  'admin.products.store',  'uses'=>  'AdminProductsController@store']);
		Route::get('edit/{id}'    ,['as'=>  'admin.products.edit',   'uses'=>  'AdminProductsController@edit']);
		Route::put('update/{id}'  ,['as'=>  'admin.products.update', 'uses'=>  'AdminProductsController@update']);
		Route::get('destroy/{id}' ,['as'=>  'admin.products.destroy','uses'=>  'AdminProductsController@destroy']);

		// products image
		Route::get('images/{id}/product'  ,['as'=>'admin.products.images',         'uses'=>'AdminProductsController@images']);
		Route::get('create/{id}/product'  ,['as'=>'admin.products.create_image',   'uses'=>'AdminProductsController@createImage']);
		Route::post('store/{id}/images'   ,['as'=>'admin.products.images.store',   'uses'=>'AdminProductsController@storeImage']);
		Route::get('destroy/{id}/image'   ,['as'=>'admin.products.images.destroy', 'uses'=>'AdminProductsController@destroyImage']);
	});
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	'test'     => 'TestController'
]);