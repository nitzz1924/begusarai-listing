<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\AuthController;


Route::group([
    'namespace' => 'Frontend',
    'as' => 'frontend.'],
    function () {
        require base_path('routes/frontend/frontend.php');
    });


// Backend


// Frontend user Routes - logged out
Route::get('/aboutUs',[HomeController::class,'aboutUs'])->name('aboutUs');
Route::get('/contactUs',[HomeController::class,'contactUs'])->name('contactUs');
Route::get('/contactUs',[HomeController::class,'contactUs'])->name('contactUs');
Route::get('/addPlace',[HomeController::class,'addPlace'])->name('addPlace');
Route::get('/packages',[HomeController::class,'packages'])->name('packages');
Route::get('/setPassword',[HomeController::class,'setPassword'])->name('setPassword');

// Business Owner routes - logged in
Route::get('/ownerDashboard',[HomeController::class,'ownerDashboard'])->name('ownerDashboard');
Route::get('/businessOwnerPage',[HomeController::class,'businessOwnerPage'])->name('businessOwnerPage');
Route::get('/ownerListing',[HomeController::class,'ownerListing'])->name('ownerListing');
Route::get('/ownerWishlist',[HomeController::class,'ownerWishlist'])->name('ownerWishlist');
Route::get('/ownerProfile',[HomeController::class,'ownerProfile'])->name('ownerProfile');
Route::get('/ownerLeads',[HomeController::class,'ownerLeads'])->name('ownerLeads');

// guest user backend routes - logged in

// Admin Auth
Route::prefix('admin_login')->group(function () {
    Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
    Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');
    Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');
    Route::get('logout', 'Auth\Admin\LoginController@logout');
});

// Admin Dashboard
Route::group([
    'namespace' => 'Backend\Admin',
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'auth:admin'],
    function () {
        require base_path('routes/backend/admin.php');
    });

// User Auth
Route::prefix('user_login')->group(function () {
    Route::get('login', 'Auth\User\LoginController@login')->name('user.auth.login');
    Route::post('login', 'Auth\User\LoginController@loginUser')->name('user.auth.loginUser');
    Route::post('logout', 'Auth\User\LoginController@logout')->name('user.auth.logout');
    Route::get('logout', 'Auth\User\LoginController@logout');
});

// User Dashboard
Route::group([
    'namespace' => 'Backend\User',
    'prefix' => 'user',
    'as' => 'user.',
    'middleware' => 'auth:user'],
    function () {
        require base_path('routes/backend/user.php');
    });

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



// Route::post('/login',[HomeController::class,'login'])->name('login');
// Route::group(['middleware' => 'web'], function () {
    Route::post('/loginForm', [AuthController::class, 'login'])->name('loginForm');

// });

