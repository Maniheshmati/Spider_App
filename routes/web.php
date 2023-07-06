<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
    return view('index');
});

Route::get('/users/register', [UserController::class, 'createView']);
Route::post('/users/register', [UserController::class, 'create']);

Route::get('/users/login', [UserController::class, 'loginView']);
Route::post('/users/login', [UserController::class, 'login']);


route::get('/posts', function (){
    return view('posts.posts');
});

Route::get('/user/{username}', [UserController::class, 'show'])->name('user.profile');

route::get('/profile', function (){

});

// Route::get('/find', function (){
//     $posts = App\Models\Post::all();
//     foreach ($posts as $post){
//         echo $post->title;
//         echo "<br>";
//         echo $post->body;
//     }
// });

Route::get('/search/{id}', function ($id){
    $posts = App\Models\Post::where('id', $id)->get();

    foreach ($posts as $post){
        echo $post->title;
    }
});

Route::get('posts/create', [PostController::class, 'create']);
Route::post('posts/create', [PostController::class, 'store']);

Route::get('/insertInfo', function(){
        $post = new App\Models\Post();
        $post->title = $_GET['postTitle'];
        $post->body = $_GET['postBody'];
        $post->save();
        return view('posts.posts');

});



// Route::get('/deletePost', function (){

//         return view('posts.delete');
// });

Route::get('/posts/delete', [PostController::class, 'deleteView']);
Route::post('/posts/delete',  [PostController::class, 'delete']);


Route::get('/posts/update', [PostController::class, 'updateView']);
Route::post('/posts/update', [PostController::class, 'update']);

Route::get('/deleteInfo', function(){


        $post = App\Models\Post::find($_GET['id']);
        $post->delete();
        return view('posts.posts');



        return $e;

});

Route::get('/search', function(){
    return view('posts.search');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
