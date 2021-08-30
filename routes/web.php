<?php


/*
 * Admin Routes
 */
Route::prefix('admin')->group(function() {

    Route::middleware('auth:admin')->group(function() {
        // Dashboard
        Route::get('/', 'DashboardController@index');

        // Products
        Route::resource('/products','ProductController');

        // Categories
        Route::get('/categories','CategoryController@index')->name('category.index');
        Route::get('/categories/delete/{id}','CategoryController@destroy')->name('category.destroy');
        Route::get('/categories/edit/{id}','CategoryController@edit')->name('category.edit');
        Route::post('/categories','CategoryController@store')->name('category.submit');
        Route::post('/categories/update/{id}','CategoryController@update')->name('category.update');

        // Orders
        Route::resource('/orders','OrderController');
        Route::get('/confirm/{id}','OrderController@confirm')->name('order.confirm');
        Route::get('/pending/{id}','OrderController@pending')->name('order.pending');
        Route::get('/process/{id}','OrderController@process')->name('order.process');
        Route::post('/done/{id}','OrderController@done')->name('order.done');
        Route::post('/success/{id}','OrderController@success')->name('order.success');
        Route::post('/restock-product','OrderController@restock')->name('order.restock');

        Route::get('preorders', 'OrderController@preorder');

        // Users
        Route::resource('/users','UsersController');
        Route::get('/users/delete/{id}','UsersController@delete')->name('users.delete');
        
        // Report
        Route::get('/report','DashboardController@report');

        // Logout
        Route::get('/logout','AdminUserController@logout');

        Route::get('/kritik','DashboardController@kritik');


    });

    // Admin Login
    Route::get('/login', 'AdminUserController@index');
    Route::post('/login', 'AdminUserController@store');
});

/*
 * Front Routes
 */

Route::get('/', 'Front\HomeController@index');
Route::get('/product/{id}', 'Front\HomeController@product');

Route::get('faq', 'Front\HomeController@faq');
Route::get('howto', 'Front\HomeController@howto');
Route::get('suggestion', 'Front\HomeController@suggestion');
Route::post('suggestion', 'Front\HomeController@suggestionStore');



// User Registration
Route::get('/user/register','Front\RegistrationController@index');
Route::post('/user/register','Front\RegistrationController@store');

// User Login
Route::get('/user/login','Front\SessionsController@index');
Route::post('/user/login','Front\SessionsController@store');

// Logout
Route::get('/user/logout','Front\SessionsController@logout');

Route::get('/user/profile', 'Front\UserProfileController@index')->middleware('auth');
Route::get('/user/order/{id}','Front\UserProfileController@show');
Route::post('/user/order/verify/{id}','Front\UserProfileController@verifyPayment')->name('verify');
Route::post('/user/success/{id}','Front\UserProfileController@success')->name('order.success');

Route::get('/invoice/{id}', 'Front\HomeController@invoice');


Route::get('/tentangkami','Front\HeaderController@tentangkami');

// Cart
Route::get('/cart', 'Front\CartController@index');
Route::post('/cart','Front\CartController@store')->name('cart');
Route::patch('/cart/update/{product}','Front\CartController@update')->name('cart.update');
Route::delete('/cart/remove/{product}','Front\CartController@destroy')->name('cart.destroy');
Route::post('/cart/saveLater/{product}', 'Front\CartController@saveLater')->name('cart.saveLater');


// Save for later
Route::delete('/saveLater/destroy/{product}','Front\SaveLaterController@destroy')->name('saveLater.destroy');
Route::post('/cart/moveToCart/{product}','Front\SaveLaterController@moveToCart')->name('moveToCart');

// Checkout
Route::get('/checkout','Front\CheckoutController@index');
Route::post('/checkout','Front\CheckoutController@store')->name('checkout');

Route::get('empty', function() {
    Cart::instance('default')->destroy();
});

// Forgot Password
Route::get('/forgot-password', 'Front\ForgotPasswordController@index');
Route::post('/forgot-password', 'Front\ForgotPasswordController@forgot');

// Update Profile
Route::get('/user/profile/update', 'Front\UserProfileController@editProfile');
Route::post('/user/profile/update', 'Front\UserProfileController@updateProfile');