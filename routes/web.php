<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\TrustController;
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

Route::get('/users/register', [UserController::class, 'createView']);
Route::post('/users/register', [UserController::class, 'create']);

Route::get('/users/login', [UserController::class, 'loginView']);
Route::post('/users/login', [UserController::class, 'login']);


route::get('/posts', function (){
    return view('posts.posts');
})->name('posts');
route::post('/posts', [PostController::class, 'exportToExcel']);

Route::get('/user/{username}', [UserController::class, 'show'])->name('user.profile');

Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
Route::get('/search/{id}', function ($id){
    $posts = App\Models\Post::where('id', $id)->get();

    foreach ($posts as $post){
        echo $post->title;
    }
});

Route::get('posts/create', [PostController::class, 'create'])->middleware('auth');
Route::post('posts/create', [PostController::class, 'store'])->middleware('auth')->name('posts.create');

Route::get('/insertInfo', function(){
        $post = new App\Models\Post();
        $post->title = $_GET['postTitle'];
        $post->body = $_GET['postBody'];
        $post->save();
        return view('posts.posts');

});

Route::get('/category', function(){
    return view('categories.show');
})->name('categories.show');

Route::get('/categories/create', [CatagoryController::class, 'createView'])->middleware('auth')->name('catagory.create');
Route::post('/categories/create', [CatagoryController::class, 'create'])->middleware('auth');

Route::post('/category/delete', [CatagoryController::class, 'delete'])->middleware('auth')->name('category.delete');
Route::get('/posts/delete', [PostController::class, 'deleteView'])->middleware('auth')->middleware(['permission:create-post']);
Route::post('/posts/delete',  [PostController::class, 'delete'])->middleware('auth')->name('posts.delete');


Route::get('/post/{id}/update', [PostController::class, 'updateView'])->middleware('auth');
Route::post('/post/{id}/update', [PostController::class, 'update'])->middleware('auth')->name('posts.update');

Route::get('/deleteInfo', function(){


        $post = App\Models\Post::find($_GET['id']);
        $post->delete();
        return view('posts.posts');



        return $e;

});

Route::get('/search', [SearchController::class, 'search']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'indexView'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'index']);
Auth::routes();


Route::get('/users', [UserController::class, 'index'])->name('users');

Route::get('/permission', [TrustController::class, 'permissionView'])->name('permission')->middleware('role:owner');
Route::post('/permission', [TrustController::class, 'permission']);

Route::get('/roles', [TrustController::class, 'roleView'])->name('role')->middleware('role:owner');
Route::post('/roles', [TrustController::class, 'role']);

Route::get('/posts/download', [PostController::class, 'exportToExcel']);
