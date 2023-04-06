<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\WedController;
use App\Http\Controllers\admin\ContactController;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//route controller
// Route::get('/baiviet',[App\Http\Controllers\ArticleController::class, 'view']);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');
// // Route::login('Admin')->group(function() {
// //     Route::get('/login', [loginController::class, 'login']);
// // });
// // Route::group(['login' => 'Admin', 'prefix' => 'admin'], function() {
// //     Route::get('/', [LoginController::class, 'login'])->name('admin.login');
// //     Route::post('/', [LoginController::class, 'checklogin'])->name('admin.checklogin');
// // });



Route::prefix('admin')->group(function () {
    Route::prefix('category')->group(function () {
        Route::get('',[CategoryController::class, 'index'])
            ->name('admin.category.index')->middleware('auth');

        Route::get('create',[CategoryController::class, 'create'])
            ->name('admin.category.create')->middleware('auth');

        Route::post('store',[CategoryController::class, 'store'])//lay request de tao
            ->name('admin.category.store')->middleware('auth'); 

        Route::get('edit/{id}',[CategoryController::class, 'edit'])
            ->name('admin.category.edit')->middleware('auth');

        Route::put('update/{id}',[CategoryController::class, 'update'])
            ->name('admin.category.update')->middleware('auth'); 

        Route::get('delete/{id}',[CategoryController::class, 'destroy'])
            ->name('admin.category.delete')->middleware('auth');    
    });

    Route::prefix('post')->group(function () {
        Route::get('',[PostController::class, 'index'])
            ->name('admin.post.index')->middleware('auth');

        Route::get('create',[PostController::class, 'create'])
            ->name('admin.post.create')->middleware('auth');

        Route::post('store',[PostController::class, 'store'])
            ->name('admin.post.store')->middleware('auth'); 

        Route::get('edit/{id}',[PostController::class, 'edit'])
            ->name('admin.post.edit')->middleware('auth');

        Route::put('update/{id}',[PostController::class, 'update'])
            ->name('admin.post.update')->middleware('auth'); 

        Route::get('delete/{id}',[PostController::class, 'destroy'])
            ->name('admin.post.delete')->middleware('auth');    
    });

    Route::prefix('user')->group(function () {
        Route::get('',[UserController::class, 'index'])
            ->name('admin.user.index');

        Route::get('create',[userController::class, 'create'])
            ->name('admin.user.create');

        Route::post('store',[UserController::class, 'store'])
            ->name('admin.user.store'); 

        Route::get('edit/{id}',[UserController::class, 'edit'])
            ->name('admin.user.edit');

        Route::put('update/{id}',[UserController::class, 'update'])
            ->name('admin.user.update'); 

        Route::get('delete/{id}',[UserController::class, 'destroy'])
            ->name('admin.user.delete');    
    })->middleware('auth');
    Route::prefix('contact')->group(function () {
        Route::get('',[ContactController::class, 'index'])
            ->name('admin.contact.index');
        Route::get('delete/{id}',[ContactController::class, 'destroy'])
            ->name('admin.contact.delete');    
    })->middleware('auth');

    Route::prefix('login')->group(function () {
        Route::get('/', [AuthController::class, 'login'])->name('admin.login');
        Route::post('/', [AuthController::class, 'checklogin'])->name('checklogin');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logoutadmin');
    });
   

});

    Route::get('/',[WedController::class,'home'])
        ->name('wed.home');
    Route::get('category',[WedController::class,'category'])
        ->name('wed.category');
    Route::get('category/{slug}',[WedController::class,'categoryslug'])
        ->name('wed.categoryslug');
    Route::get('post/{slug}',[WedController::class,'post'])
        ->name('wed.postslug');
    Route::get('contact',[WedController::class,'contact'])
        ->name('wed.contact');
    Route::post('contact',[WedController::class,'sendcontact'])
        ->name('wed.sendcontact');
    Route::post('/comment/{slug}',[WedController::class,'comment'])
        ->name('wed.comment');
    Route::get('/login',[WedController::class,'login'])
        ->name('wed.login');
    Route::post('/checklogin/{comment}/{slug}',[WedController::class,'checklogin'])
        ->name('wed.checklogin');



Route::get('/facebook/login', function () {
    return Socialite::driver('facebook')->redirect();
})->name('loginfacebook');

Route::get('auth/callback', function () {
    $user = Socialite::driver('facebook')->user();
 
    // $user->token
});