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

Route::get('/', ['uses' => 'MainController@index', 'as' => 'main']);
Route::get('/categories/{category}/{alias}', ['uses' => 'ProductController@index', 'as' => 'product']);
Route::get('/categories/{alias}', ['uses' => 'CategoryController@index', 'as' => 'category']);

Route::get('/about', ['uses' => 'ArticlesControllers@about', 'as' => 'about']);
Route::get('/contacts', ['uses' => 'ArticlesControllers@contacts', 'as' => 'contacts']);
Route::get('/partnership', ['uses' => 'ArticlesControllers@partnership', 'as' => 'partnership']);
Route::get('/delivery', ['uses' => 'ArticlesControllers@delivery', 'as' => 'delivery']);
Route::get('/guarantees', ['uses' => 'ArticlesControllers@guarantees', 'as' => 'guarantees']);
Route::get('/career', ['uses' => 'ArticlesControllers@career', 'as' => 'career']);
Route::get('/questions_answers', ['uses' => 'ArticlesControllers@questionsAnswers', 'as' => 'questionsAnswers']);
Route::get('/connection', ['uses' => 'ArticlesControllers@connection', 'as' => 'connection']);
Route::get('/support', ['uses' => 'ArticlesControllers@support', 'as' => 'support']);
Route::get('/return_products', ['uses' => 'ArticlesControllers@returnProducts', 'as' => 'returnProducts']);
Route::get('/shares', ['uses' => 'ArticlesControllers@shares', 'as' => 'shares']);

Route::get('/search', ['uses' => 'SearchController@index', 'as' => 'search_show']);

Route::post('/subscribe', ['uses' => 'SubscribeController@index', 'as' => 'subscribe']);

/*Log social*/

Route::get('auth/{driver}', ['as' => 'socialAuth', 'uses' => 'Auth\SocialController@redirectToProvider']);
Route::get('auth/{driver}/callback', ['as' => 'socialAuthCallback', 'uses' => 'Auth\SocialController@handleProviderCallback']);

/**/

Route::post('/product/add', ['uses' => 'BasketController@addProduct', 'as' => 'addProduct']);

Route::get('/basket', ['uses' => 'BasketController@showBasket', 'as' => 'showBasket']);
/*Route::post('/basket', ['uses' => 'BasketController@showBasket', 'as' => 'showBasket']);*/

Route::post('/billing', ['uses' => 'BasketController@showBilling', 'as' => 'showBilling']);
Route::post('/billing/make', ['uses' => 'BasketController@makeBilling', 'as' => 'makeBilling']);

Auth::routes();

Route::namespace('Cabinet')->group(function () {
    Route::get('/home', ['uses' => 'UserCabinetController@index', 'as' => 'home']);
    Route::get('/wishlist', ['uses' => 'UserCabinetController@showWishList', 'as' => 'showWishList']);
    Route::get('/history', ['uses' => 'UserCabinetController@showHistory', 'as' => 'showHistory']);
    /*Route::get('/information', ['uses' => 'UserCabinetController@information', 'as' => 'showInformation']);*/

    Route::post('/wishlist/add', ['uses' => 'UserCabinetController@addToWishList', 'as' => 'addToWishList']);

    Route::match(['get', 'post'], '/change/information', ['uses' => 'UserCabinetController@changeInformation', 'as' => 'changeInformation']);
    Route::match(['get', 'post'], '/change/email', ['uses' => 'UserCabinetController@changeEmail', 'as' => 'changeEmail']);
    Route::match(['get', 'post'], '/change/password', ['uses' => 'UserCabinetController@changePassword', 'as' => 'changePassword']);
});