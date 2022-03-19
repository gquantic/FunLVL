<?php

use Illuminate\Support\Facades\Auth;
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

//Route::get('/', [\App\Http\Controllers\IndexController::class,'index'])->name('index');

Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::get('/article/{article}', [\App\Http\Controllers\HomeController::class,'index'])->name('blog.article');

Route::get('/games', [\App\Http\Controllers\Shop\GameController::class,'index'])->name('shop.games');
Route::get('/game/{game}', [\App\Http\Controllers\Shop\GameController::class,'show'])->name('shop.game');

Route::get('/market',[\App\Http\Controllers\Shop\MarketController::class,'index'])->name('market');
Route::get('/seller/{seller}/products',[\App\Http\Controllers\Shop\SellerController::class,'products'])
    ->name('seller.products');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::resource('/products',\App\Http\Controllers\Shop\ProductController::class);

    Route::get('/seller/{seller}',[\App\Http\Controllers\Shop\SellerController::class,'index'])->name('seller');
    Route::get('/seller/{seller}/feedbacks',[\App\Http\Controllers\Shop\SellerController::class,'feedbacks'])
        ->name('seller.feedbacks');
    Route::get('/seller/{seller}/feedback',[\App\Http\Controllers\Shop\SellerController::class,'feedbackForm'])
        ->name('seller.feedback.form');
    Route::post('/seller/{seller}/feedback/create',[\App\Http\Controllers\Shop\SellerController::class,'addFeedback'])
        ->name('seller.feedback.create');

    Route::get('/user/{user}',[\App\Http\Controllers\ProfileController::class,'user'])->name('user');

    Route::get('/profile',[\App\Http\Controllers\ProfileController::class,'index'])->name('profile');
    Route::post('/profile',[\App\Http\Controllers\ProfileController::class,'post'])->name('profile.post');

    Route::get('/balance',[\App\Http\Controllers\BalanceController::class,'index'])->name('balance');

    Route::get('/history',[\App\Http\Controllers\Shop\HistoryController::class,'index'])->name('history');

    Route::get('/messages',[\App\Http\Controllers\ChatController::class,'messages'])->name('messages');
    Route::get('/start/{product}',[\App\Http\Controllers\ChatController::class,'start'])->name('chat.start');
    Route::get('/chat/{chat}',[\App\Http\Controllers\ChatController::class,'chat'])->name('chat');
    Route::get('/spend/{chat}',[\App\Http\Controllers\ChatController::class,'spend'])->name('spend');
    Route::get('/feedback/{chat}',[\App\Http\Controllers\ChatController::class,'feedback'])->name('feedback');
    Route::get('/feedback/{chat}',[\App\Http\Controllers\ChatController::class,'feedback_post'])->name('feedback_post');

    Route::get('/ticket',[\App\Http\Controllers\TicketController::class,'index'])->name('ticket');
    Route::post('/ticket',[\App\Http\Controllers\TicketController::class,'post'])->name('ticket_post');

    Route::get('/logout',[\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
});

Route::middleware('role:admin')->name('admin.')->group(function () {
    Route::get('/admin',[\App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');

    Route::resource('/admin/categories',\App\Http\Controllers\Admin\CategoryController::class);
    Route::get('/admin/category/{category}/delete/{type}',[\App\Http\Controllers\Admin\CategoryController::class,'destroy'])
        ->name('categories.delete');
    Route::get('/admin/category/{category}/restore',[\App\Http\Controllers\Admin\CategoryController::class,'restore'])
        ->name('categories.restore');

    Route::resource('/admin/ticket-categories',\App\Http\Controllers\Admin\TicketCategoryController::class);
    Route::get('/admin/ticket-category/{ticket_category}/delete/{type}',[\App\Http\Controllers\Admin\TicketCategoryController::class,'destroy'])
        ->name('ticket-categories.delete');
    Route::get('/admin/ticket-category/{ticket_category}/restore',[\App\Http\Controllers\Admin\TicketCategoryController::class,'restore'])
        ->name('ticket-categories.restore');

    Route::get('/admin/tickets',[\App\Http\Controllers\Admin\TicketController::class,'index'])->name('tickets');
    Route::get('/admin/ticket/{ticket}',[\App\Http\Controllers\Admin\TicketController::class,'show'])->name('ticket.show');
    Route::post('/admin/ticket/{ticket}',[\App\Http\Controllers\Admin\TicketController::class,'post'])->name('ticket.post');

    Route::resource('/admin/games',\App\Http\Controllers\Admin\GameController::class);
    Route::get('/admin/game/{game}/delete/{type}',[\App\Http\Controllers\Admin\GameController::class,'destroy'])
        ->name('games.delete');
    Route::get('/admin/game/{game}/restore',[\App\Http\Controllers\Admin\GameController::class,'restore'])
        ->name('games.restore');

    Route::resource('/admin/servers',\App\Http\Controllers\Admin\ServerController::class);
    Route::get('/admin/servers/{server}/delete/{type}',[\App\Http\Controllers\Admin\ServerController::class,'destroy'])
        ->name('servers.delete');
    Route::get('/admin/servers/{server}/restore',[\App\Http\Controllers\Admin\ServerController::class,'restore'])
        ->name('servers.restore');

    Route::get('/admin/products',[\App\Http\Controllers\Admin\ProductController::class,'index'])->name('products');
    Route::get('/admin/product/{product}/view',[\App\Http\Controllers\Admin\ProductController::class,'view'])
        ->name('product.view');
    Route::get('/admin/product/{product}/approved',[\App\Http\Controllers\Admin\ProductController::class,'approved'])
        ->name('product.approved');
    Route::get('/admin/product/{product}/unapproved',[\App\Http\Controllers\Admin\ProductController::class,'unapproved'])
        ->name('product.unapproved');

    Route::resource('/admin/articles',\App\Http\Controllers\Admin\ArticleController::class);
    Route::get('/admin/article/{article}/delete/{type}',[\App\Http\Controllers\Admin\TicketCategoryController::class,'destroy'])
        ->name('articles.delete');
    Route::get('/admin/article/{article}/restore',[\App\Http\Controllers\Admin\TicketCategoryController::class,'restore'])
        ->name('articles.restore');

    Route::get('/admin/users',[\App\Http\Controllers\Admin\UserController::class,'index'])->name('users');
    Route::get('/admin/user/{user}',[\App\Http\Controllers\Admin\UserController::class,'view'])->name('user.view');
    Route::get('/admin/user/{user}/verified',[\App\Http\Controllers\Admin\UserController::class,'verified'])
        ->name('user.verified');

    Route::resource('/admin/settings',\App\Http\Controllers\Admin\SettingsController::class);
});
