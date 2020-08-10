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

Auth::routes([
    'register' => false,
    'confirm' => false,
    'verify' => false,
    'reset' => false,
]);
Route::group(['namespace' => 'Auth'], function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login')->name('auth.login');
    Route::get('/logout', 'LoginController@logout')->name('get.logout');
});

$groupData = [
    'namespace' => 'Shop\Admin',
    'prefix' => 'admin',
    'middleware' => 'auth',
];
Route::group($groupData, function () {
    $methods = ['index', 'edit', 'store', 'create', 'update'];
    Route::get('/', 'IndexController@index');
    /*Категории*/
    Route::resource('/categories', 'CategoryController')->only($methods)->names('shop.admin.categories');
    Route::match(['get', 'post'], '/categories/add-image', ['uses' => 'CategoryController@addImage', 'as' => 'shop.admin.categories.addImage']);
    Route::get('/categories/delete{id}', ['uses' => 'CategoryController@deleteCategory', 'as' => 'shop.admin.categories.deleteCategory']);
    /*Товары*/
    Route::resource('/products', 'ProductsController')->only($methods)->names('shop.admin.products');
    Route::match(['get', 'post'], '/products/add-image', ['uses' => 'ProductsController@addImage', 'as' => 'shop.admin.products.addImage']);
    Route::get('/products/delete{id}', ['uses' => 'ProductsController@deleteProduct', 'as' => 'shop.admin.products.deleteProduct']);
    Route::get('/products/deleteitem{id}', ['uses' => 'ProductsController@deleteItem', 'as' => 'shop.admin.products.deleteItem']);
    Route::get('/products/{alias}', ['uses' => 'ProductsController@list', 'as' => 'shop.admin.products.list']);
    /*Навигация*/
    Route::resource('/navigation', 'NavigationController')->only($methods)->names('shop.admin.navigation');
    Route::get('/navigation/delete{id}', ['uses' => 'NavigationController@deleteNavigation', 'as' => 'shop.admin.navigation.deleteNavigation']);
    Route::match(['get', 'post'], '/navigation/add-image', ['uses' => 'NavigationController@addImage', 'as' => 'shop.admin.navigation.addImage']);
    /*Слайдер*/
    Route::resource('/sliders', 'SlidersController')->only($methods)->names('shop.admin.sliders');
    Route::get('/sliders/delete{id}', ['uses' => 'SlidersController@deleteSlider', 'as' => 'shop.admin.sliders.deleteSlider']);
    Route::match(['get', 'post'], '/sliders/add-image', ['uses' => 'SlidersController@addImage', 'as' => 'shop.admin.sliders.addImage']);
    /*Блог*/
    Route::resource('/blog', 'BlogController')->only($methods)->names('shop.admin.blog');
    Route::get('/blog/delete{id}', ['uses' => 'BlogController@deleteArticle', 'as' => 'shop.admin.blog.deleteArticle']);
    Route::match(['get', 'post'], '/blog/add-image', ['uses' => 'BlogController@addImage', 'as' => 'shop.admin.blog.addImage']);
});

/*Клиентская часть*/
Route::group(['namespace' => 'Shop'], function () {
    $methods = ['index'];
    $methodsCategories = ['index'];
    $methodsProducts = ['show'];
    $methodsCart = ['show', 'store', 'index'];
    $methodsContacts = ['store', 'index'];
    $methodsBlog = ['show', 'index'];

    Route::resource('/', 'MainController')
        ->names('shop.main')
        ->only($methods);

    Route::resource('/products', 'ProductsController', [
        'parameters' => [
            'products' => 'alias',
        ]
    ])->only($methodsProducts);

    Route::resource('/contacts', 'ContactsController')
        ->names('contacts')
        ->only($methodsContacts);

    Route::resource('/menu', 'CategoriesController', [
        'parameters' => [
            'menu' => 'alias',
        ]
    ])->only($methodsCategories);

    Route::resource('/blog', 'BlogController')
        ->names('blog')
        ->only($methodsBlog);

    Route::get('/cart/checkout', ['uses' => 'CartController@checkout', 'as' => 'cart.checkout']);
    Route::get('/cart/clear', ['uses' => 'CartController@clear', 'as' => 'cart.clear']);
    Route::get('/cart/delete', ['uses' => 'CartController@delete', 'as' => 'cart.delete']);
    Route::resource('/cart', 'CartController', [
        'parameters' => [
            'cart' => 'id',
        ]
    ])->names('cart')
        ->only($methodsCart);

    Route::get('/product/{alias}', ['uses' => 'ProductsController@showProduct', 'as' => 'product.info']);

    Route::get('/search/result', ['uses' => 'SearchController@index', 'as' => 'products.result']);
    Route::get('/autocomplete', ['uses' => 'SearchController@search', 'as' => 'products.search']);
    Route::get('/searchBlog/result', ['uses' => 'SearchBlogController@index', 'as' => 'blog.result']);
    Route::get('/autocompleteBlog', ['uses' => 'SearchBlogController@search', 'as' => 'blog.search']);

    Route::match(['get', 'post'], '/about', ['uses' => 'AboutController@index', 'as' => 'about.index']);
});
