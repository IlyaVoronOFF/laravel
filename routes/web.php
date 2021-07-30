<?php

use App\Http\Controllers\Account\IndexController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController as CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController as HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return response()->json([
        'title' => 'Example',
        'status' => false,
        'description' => 'ExampleDescription',
    ]);
});

//User
Route::get('/auth', [AuthController::class, 'index'])->name('auth');
Route::resource('feedback', FeedbackController::class);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/{id}', [CategoryController::class, 'show'])->where('id', '\d+')->name('category.showNews');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{news}', [NewsController::class, 'show'])->where('news', '\d+')->name('news.show');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', IndexController::class)->name('account');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    });
    Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {
        Route::view('/', 'admin.index')->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);

        Route::get('/parse', ParserController::class);
    });
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/init/{driver?}', [SocialController::class, 'init'])
        ->name('social.init');
    Route::get('/callback/{driver?}', [SocialController::class, 'callback'])
        ->name('social.callback');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');