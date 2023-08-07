<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TrustController;
use App\Http\Controllers\AdminController;


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
    return view('search');
});
# Users
Route::get('/users/register', [UserController::class, 'createView']);
Route::post('/users/register', [UserController::class, 'create']);

Route::get('/users/login', [UserController::class, 'loginView']);
Route::post('/users/login', [UserController::class, 'login'])->name('login');

Route::get('/user/{id}/update', [UserController::class, 'updateView'])->middleware('auth');
Route::post('/user/{id}/update', [UserController::class, 'update'])->middleware('auth');

Route::get('/users', [UserController::class, 'index'])->name('users');

# Posts

route::get('/posts', function (){
    return view('posts.posts');
})->name('posts');
route::post('/posts', [PostController::class, 'exportToExcel']);

Route::get('/user/{username}', [UserController::class, 'show'])->name('user.profile');
Route::post('/user/{username}', [UserController::class, 'delete'])->name('user.delete');

Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
Route::post('/post/{id}', [CommentController::class, 'store'])->name('comment.store');

Route::get('posts/create', [PostController::class, 'create'])->middleware('auth');
Route::post('posts/create', [PostController::class, 'store'])->middleware('auth')->name('posts.create');

Route::get('/post/{id}/delete', [PostController::class, 'deleteView'])->middleware('auth');
Route::post('/post/{id}/delete',  [PostController::class, 'delete'])->middleware('auth')->name('posts.delete');

Route::get('/post/{id}/update', [PostController::class, 'updateView'])->middleware('auth');
Route::post('/post/{id}/update', [PostController::class, 'update'])->middleware('auth')->name('posts.update');

# Categories

Route::get('/category', function(){
    return view('categories.show');
})->name('categories.show');

Route::get('/categories/create', [CatagoryController::class, 'createView'])->middleware('auth')->name('catagory.create');
Route::post('/categories/create', [CatagoryController::class, 'create'])->middleware('auth');

Route::post('/category/delete', [CatagoryController::class, 'delete'])->middleware('auth')->name('category.delete');

Route::get('/category/update', [CatagoryController::class, 'updateView'])->name('category.update');
Route::post('/category/update', [CatagoryController::class, 'update']);

#Search

Route::get('/search', [SearchController::class, 'search']);

# Dashboard

Route::get('/home', [App\Http\Controllers\HomeController::class, 'indexView'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'index']);


#Permissions and Roles

Route::get('/permission', [TrustController::class, 'permissionView'])->name('permission')->middleware('permission:create-post');
Route::post('/permission', [TrustController::class, 'permission']);

Route::get('/roles', [TrustController::class, 'roleView'])->name('role')->middleware('permission:create-post')->middleware('role:owner');
Route::post('/roles', [TrustController::class, 'role']);

# Files Operations

Route::get('/posts/download', [PostController::class, 'exportToExcel']);

# Admin panel 
Route::get('/admin', [AdminController::class, 'panelView']);

# Show all requests on map
Route::get('/map', [PostController::class, 'mapView'])->name('map');