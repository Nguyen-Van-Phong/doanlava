<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',function(){
    return'page home';
});
Route::get('/shop',function(){
    return'page shop';
})->middleware('checkage');
Route::get('/about',function(){
    return'page about';
});
Route::get('/contact',function(){
    return'page contact';
});
Route::post('/post',function(){
    echo 'Method post';
});
Route::put('/put',function(){
    echo 'Method put';
});
Route::prefix('admin')->group(function(){
    Route::get('posts/{post}/comments/{comment}',function($postId,$commentId){
        return "postId:$postId - commentId:$commentId";
    });
    Route::get('user/{name?}',function($name ='jonh'){
        return $name;
    });
});

Route::resource('users',UserController::class);
Route::resource('categories',CategoryController::class);
Route::resource('products',ProductController::class);
Route::resource('orders',OrderController::class);
Route::resource('orderitems',OrderItemController::class);
Route::get('/child',function(){
    return view('child');
})->middleware('checklogin');
Route::get('/admin',function(){
    return view('admin.layout');
});


Route::group(['prefix' => 'admin'], function(){
    Route::resource('users',App\Http\Controllers\Admin\UserController::class,['names' => 'admin.users']);

    //
    
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class,['names' =>'admin.products']);
   
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class,['names' =>'admin.categories']);
   
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
