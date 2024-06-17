<?php

use App\Http\Controllers\Backend\Admin\ViewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\Admin\UserController;

Route::group(
    [
        'namespace' => 'Frontend',
        'as' => 'frontend.',
    ],
    function () {
        require base_path('routes/frontend/frontend.php');
    },
);

// Backend

// Frontend user Routes - logged out
Route::get('/aboutUs', [HomeController::class, 'aboutUs'])->name('aboutUs');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/savecontact', [HomeController::class, 'savecontact'])->name('savecontact');

Route::get('/registration', [HomeController::class, 'registration'])->name('registration');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
Route::get('/searchCity', [HomeController::class, 'searchCity'])->name('searchCity');
Route::get('/checkoutPage/{businessid}/{userId}/{planId}', [HomeController::class, 'checkoutPage'])->name('checkoutPage');
Route::get('/privacyPolicy', [HomeController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('/pageNotFound', [HomeController::class, 'pageNotFound'])->name('pageNotFound');
Route::get('/termsAndConditions', [HomeController::class, 'termsAndConditions'])->name('termsAndConditions');
Route::get('/returnsPolicy ', [HomeController::class, 'returnsPolicy'])->name('returnsPolicy');
Route::get('/allCategories ', [HomeController::class, 'allCategories'])->name('allCategories');
Route::get('/comingSoon ', [HomeController::class, 'comingSoon'])->name('comingSoon');

// Business Owner routes - logged in
Route::get('/ownerDashboard', [HomeController::class, 'ownerDashboard'])->name('ownerDashboard');
Route::get('/listingDetail/{id}/{category}', [HomeController::class, 'listingDetail'])->name('listingDetail');
Route::get('/blogDetails/{id}', [HomeController::class, 'blogDetails'])->name('blogDetails');

Route::get('/ownerWishlist', [HomeController::class, 'ownerWishlist'])->name('ownerWishlist');
Route::get('/ownerLeads/{id}', [HomeController::class, 'ownerLeads'])->name('ownerLeads');
Route::get('/setPassword', [HomeController::class, 'setPassword'])->name('setPassword');
Route::get('/ownerShop', [HomeController::class, 'ownerShop'])->name('ownerShop');
Route::get('/businessOwnerPage', [HomeController::class, 'businessOwnerPage'])->name('businessOwnerPage');

// guest user backend routes - logged in

// Admin Auth
Route::prefix('admin_login')->group(function () {
    Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
    Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');
    Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');
    Route::get('logout', 'Auth\Admin\LoginController@logout');
});

// Admin Dashboard
Route::group(
    [
        'namespace' => 'Backend\Admin',
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => 'auth:admin',
    ],
    function () {
        require base_path('routes/backend/admin.php');
    },
);

// User Auth
// Route::prefix('user_login')->group(function () {
//     Route::get('login', 'Auth\User\LoginController@login')->name('user.auth.login');
//     Route::post('login', 'Auth\User\LoginController@loginUser')->name('user.auth.loginUser');
//     Route::post('logout', 'Auth\User\LoginController@logout')->name('user.auth.logout');
//     Route::get('logout', 'Auth\User\LoginController@logout');
// });

// User Dashboard
Route::group(
    [
        'namespace' => 'Backend\User',
        'prefix' => 'user',
        'as' => 'user.',
        'middleware' => 'auth:user',
    ],
    function () {
        require base_path('routes/backend/user.php');
    },
);

// clear config and cache
//['cache:clear', 'optimize', 'route:cache', 'route:clear', 'view:clear', 'config:cache']

//    /artisan/cache-clear  // replace (:) to (-)
//Route::get('/artisan/{cmd}', function($cmd) {
//   $cmd = trim(str_replace("-",":", $cmd));
//   $validCommands = ['cache:clear', 'optimize', 'route:cache', 'route:clear', 'view:clear', 'config:cache'];
//   if (in_array($cmd, $validCommands)) {
//      Artisan::call($cmd);
//      return "<h1>Ran Artisan command: {$cmd}</h1>";
//   } else {
//      return "<h1>Not valid Artisan command</h1>";
//   }
//});

Route::post('/signup', [HomeController::class, 'signup'])->name('signup');
Route::post('/SubmitPassword', [HomeController::class, 'SubmitPassword'])->name('SubmitPassword');
Route::get('/', [HomeController::class, 'index'])->name('index');

// Route::get('/login', [HomeController::class, 'showLoginForm'])->name('user.login');
// Route::post('/login', [HomeController::class, 'loginForm'])->name('user.loginForm');

Route::get('/login', [HomeController::class, 'showLoginForm'])->name('login');
Route::post('/login', [HomeController::class, 'loginForm'])->name('loginForm');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Your protected routes go here
});

Route::post('/add-business', 'HomeController@store')->name('business.store');
Route::get('/ownerListing', [HomeController::class, 'ownerListing'])->name('ownerListing');

Route::delete('/business/delete/{id}', 'Frontend\HomeController@delete')->name('delete');

Route::get('/editPlace/{id}', [HomeController::class, 'editPlace'])->name('editPlace');

Route::put('/editPlace/updatePlace/{id}', [HomeController::class, 'updatePlace'])->name('updatePlace');

// Route::get('/testimonial', [HomeController::class, 'Testimonial'])->name('Testimonial');
// Route::post('/testimonial', [HomeController::class, 'testimonialStore'])->name('testimonialStore');

Route::get('/testimonial', [HomeController::class, 'Testimonial'])->name('testimonial');
Route::post('/testimonial', [HomeController::class, 'testimonialStore'])->name('testimonialStore');

Route::get('/lead', [HomeController::class, 'Lead'])->name('Lead');
Route::post('/lead', [HomeController::class, 'LeadStore'])->name('LeadStore');
// Route::post('/lead/{businessId}', 'Frontend\HomeController@LeadStore');

Route::get('/career', [HomeController::class, 'career'])->name('career');
Route::post('/career', [HomeController::class, 'careerStore'])->name('careerStore');

//bookmark route
Route::post('/bookmark/{businessId}', [HomeController::class, 'toggleBookmark'])->name('bookmark.toggle');
Route::get('/searchFilter/{category?}/{city?}/{highlight?}', [HomeController::class, 'searchFilter'])->name('searchFilter');


// Define a POST route for submitting the form data
Route::post('/showFilterData', [HomeController::class, 'showFilterData'])->name('showFilterData');



Route::put('/update-places', [HomeController::class, 'updatePlaces'])->name('updatePlaces');
Route::get('/ownerProfile', [HomeController::class, 'ownerProfile'])->name('ownerProfile');
Route::post('/ownerProfile/update-profile', [HomeController::class, 'updateprofile'])->name('updateprofile');
Route::get('/change-password-form', [HomeController::class, 'changePassword'])->name('changePassword');
Route::post('/change-password-form/savepassword', [HomeController::class, 'savepassword'])->name('savepassword');
Route::get('/reviews', [HomeController::class, 'showReviews'])->name('showReviews');
Route::post('/submit-review/{id}', [HomeController::class, 'reviewStore'])->name('reviewStore');
Route::get('/payment', 'RazorpayController@payment')->name('payment');
Route::post('/handlePayment', 'RazorpayController@handlePayment')->name('handlePayment');
Route::get('/paymentresult', 'RazorpayController@paymentresult')->name('paymentresult');
Route::get('/packages/{id}', [HomeController::class, 'packages'])->name('packages');
Route::get('/category/{id}', [HomeController::class, 'category'])->name('category');
Route::get('/faq', [HomeController::class, 'Faq'])->name('Faq');

// Example route definition

// Route::get('/resetPassword', [HomeController::class, 'showResetPasswordForm'])->name('resetPassword');
// Route::get('/resetPassword', [HomeController::class, 'submitResetPasswordForm'])->name('submitResetPassword');

// Route::get('/resetPassword', [HomeController::class, 'resetPassword'])->name('resetPassword');
// Route::post('/resetPassword/submitResetPassword', [HomeController::class, 'submitResetPasswordForm'])->name('submitResetPassword');
// Route::get('/resetPassword', [HomeController::class, 'resetPassword'])->name('resetPassword');
// Route::post('/resetPassword', [HomeController::class, 'submitResetPasswordForm'])->name('submitResetPassword');
// routes/web.php
Route::get('/resetPassword', [HomeController::class, 'showResetPasswordForm'])->name('resetPassword');
Route::post('/resetPassword', [HomeController::class, 'submitResetPasswordForm']);




Route::get('/addPlace', [HomeController::class, 'addPlace'])->name('addPlace');
Route::post('/addPlace/savePlace', [HomeController::class, 'savePlace'])->name('savePlace');



//Latest Update Routes
Route::get('/addDuration/{id}', [HomeController::class, 'addDuration'])->name('addDuration');
Route::post('/addDuration/saveDuration', [HomeController::class, 'saveDuration'])->name('saveDuration');
Route::delete('/delete-duration/{id}', [HomeController::class, 'deleteDuration'])->name('deleteDuration');
Route::get('/adduser', [ViewController::class, 'adduser'])->name('adduser');
Route::post('/createuser', [UserController::class, 'createuser'])->name('createuser');
Route::get('/userlistings/{id}', [UserController::class, 'userlistings'])->name('userlistings');
Route::get('/viewlistingform/{id}', [UserController::class, 'viewlistingform'])->name('viewlistingform');
Route::post('/createbusinessListing', [UserController::class, 'createbusinessListing'])->name('createbusinessListing');


//New Routes
Route::get('/completeProfile/{id}', [HomeController::class, 'completeProfile'])->name('completeProfile');
Route::put('/updateHighlights/{id}', [HomeController::class, 'updateHighlights'])->name('updateHighlights');
Route::put('/updateLocations/{id}', [HomeController::class, 'updateLocations'])->name('updateLocations');

