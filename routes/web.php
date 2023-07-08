<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
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
});

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




Route::get('/posts/delete', [PostController::class, 'deleteView'])->middleware('auth');
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [UserController::class, 'index']);
