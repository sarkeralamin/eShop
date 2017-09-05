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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'MainController@index');

Route::resource('users', 'UserController');
Route::resource('posts', 'PostController');

Route::get('contact', ['as' => 'contact.mail', 'uses' => 'ContactController@getContact']);
Route::post('contact', ['as' => 'contact.mail', 'uses' => 'ContactController@postContactUsForm']);

Route::get('/posts/{id}', ['as' => 'posts.single', 'uses' => 'PostController@show']);


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

        Route::get('/product/new', ['as' => 'shop.add', 'uses' => 'ProductController@create']);
        Route::get('/products', ['as' => 'shop.index', 'uses' => 'ProductController@index']);
        Route::get('/product/destroy/{id}', ['as' => 'shop.destroy', 'uses' => 'ProductController@destroy']);
        Route::post('/product/save', ['as' => 'shop.store', 'uses' => 'ProductController@store']);

});

Auth::routes();

Route::get('/addProduct/{productId}', 'CartController@addItem');
Route::get('/removeItem/{productId}', 'CartController@removeItem');
Route::get('/cart', 'CartController@showCart');


Route::post('/checkout', 'OrderController@checkout');

Route::get('order/{orderId}', 'OrderController@viewOrder');
Route::get('order', 'OrderController@index');
Route::get('download/{orderId}/{filename}', 'OrderController@download');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
