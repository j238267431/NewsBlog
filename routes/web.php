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

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Auth::routes();
Route::group(['middleware' => 'guest'], function(){
    Route::get('/login/vk', [\App\Http\Controllers\Socialite\VKSocialiteController::class, 'redirectToProvider'])
        ->name('vk.login');
    Route::get('/login/vk/callback', [
        \App\Http\Controllers\Socialite\VKSocialiteController::class, 'handleProviderCallback'
    ])->name('vk.login.callback');
});


Route::get('/parser', [App\Http\Controllers\PareserController::class, 'index'])
    ->middleware('admin')
    ->name('parser');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categories', [App\Http\Controllers\Categories\CategoriesController::class, 'index'])
    ->name('categories');
Route::get('/replies', [\App\Http\Controllers\RepliesController::class, 'store'])->name('replies');
Route::get('/categories/{slug}/', [\App\Http\Controllers\Categories\CategoriesController::class, 'show'])
    ->name('categories.show');
Route::get('/categories/{slug}/{id}', [\App\Http\Controllers\Categories\CategoriesController::class,'showNews'])
    ->name('categories.show.news');
Route::get('/leave/comment', [\App\Http\Controllers\CommentsController::class, 'store']);
//Route::resource('categories.news.comments', \App\Http\Controllers\CommentsController::class);
//    ->scoped(['comment' => 'id']);
Route::resource('/article', \App\Http\Controllers\ArticleController::class);
Route::resource('/comments', \App\Http\Controllers\CommentsController::class);
//Route::post('/comments', [\App\Http\Controllers\CommentsController::class,'test'])->name('comments');
//Route::get('/categories/{slug}/{id}/comments/{comment:slug}', [
//    \App\Http\Controllers\CommentsController::class, 'show'])
//    ->name('categories.show.news.comment');
Route::get('/pagination',[\App\Http\Controllers\BlockController::class, 'index']);
Route::get('pagination/fetch_data', [\App\Http\Controllers\BlockController::class, 'fetch_data']);
Route::get('/pagination/ajax', [\App\Http\Controllers\Categories\CategoriesController::class, 'showNews']);
Route::get('likes', [\App\Http\Controllers\LikesController::class, 'store'])->name('likes');
Route::resources([
    '/form/feedback' => App\Http\Controllers\Feedback\FeedbackController::class,
    '/form/request' => App\Http\Controllers\ReqController::class
]);




Route::get('searchSimple', [\App\Http\Controllers\SearchController::class, 'index'])->name('searchSimple');
Route::get('/', function () {
    return Redirect::away('http://yandex.ru');
})->name('yandex');

Route::middleware('auth')->group(function(){
    Route::post('password/update', [\App\Http\Controllers\Auth\UpdatePasswordController::class, 'changePassword'])
        ->name('password.update');
    Route::prefix('account')->group(function(){
        route::get('', [App\Http\Controllers\Account\IndexController::class, 'index'])
        ->name('account');
        route::post('update', [\App\Http\Controllers\Account\IndexController::class, 'accountUpdate'])
            ->name('account.update');
        route::post('image.update', [\App\Http\Controllers\Account\IndexController::class, 'imageChange'])
            ->name('image.update');
        route::post('account.create', [\App\Http\Controllers\Account\IndexController::class, 'profileCreate'])
            ->name('image.create');
    });

    Route::resource(
        'profile', \App\Http\Controllers\Profile\ProfileController::class
    )->parameters(['profile' => 'usersProfiles']);
    Route::prefix('admin')->middleware('admin')->group(function(){
        Route::get('/',[\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('admin');
        Route::get('categories', [\App\Http\Controllers\Admin\CategoriesController::class, 'index'])
            ->name('admin.categories');
        Route::get('news.delete', [\App\Http\Controllers\Admin\NewsController::class, 'destroy'])
            ->name('admin.news.delete');
        Route::get('news/{slug}', [\App\Http\Controllers\Admin\NewsController::class, 'index'])
            ->name('admin.news');
        Route::resources([
            '/users' => App\Http\Controllers\Admin\UsersController::class,
            '/news' => App\Http\Controllers\Admin\NewsController::class,
        ]);
        Route::get('search', [\App\Http\Controllers\Admin\SearchController::class, 'index'])
            ->name('admin.searchSimple');

        Route::get('categories/{slug}',[\App\Http\Controllers\Admin\CategoriesController::class, 'show'])
        ->name('category.show');
    });



});

