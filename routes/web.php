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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categories', [App\Http\Controllers\Categories\CategoriesController::class, 'index'])
    ->name('categories');
Route::get('/categories/{id}', [\App\Http\Controllers\Categories\CategoriesController::class, 'show'])
    ->name('categories.show');
Route::resources([
    '/form/feedback' => App\Http\Controllers\Feedback\FeedbackController::class,
    '/form/request' => App\Http\Controllers\ReqController::class
]);
Route::middleware('auth')->group(function(){
    Route::prefix('account')->group(function(){
        route::get('/', [App\Http\Controllers\Account\IndexController::class, 'index'])
        ->name('account');
    });
    Route::prefix('admin')->middleware('admin')->group(function(){
        Route::resources([
            '/users' => App\Http\Controllers\admin\UsersController::class,
            '/news' => App\Http\Controllers\admin\NewsController::class,
            '/users/{id}' => App\Http\Controllers\admin\UsersController::class,
            '/news/{id}' => App\Http\Controllers\admin\NewsController::class,
        ]);
    });
});


//Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
//    Route::resources([
//        '/users' => App\Http\Controllers\admin\UsersController::class,
//        '/news' => App\Http\Controllers\admin\NewsController::class,
//        '/users/{id}' => App\Http\Controllers\admin\UsersController::class,
//        '/news/{id}' => App\Http\Controllers\admin\NewsController::class,
//    ]);
//});










