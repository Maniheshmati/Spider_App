<?php

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
    return view('index');
});

Route::get('/register', function (){
    return view('register');
});

Route::get('/login', function (){
    return view('login');
});

route::get('/posts', function (){
    return view('posts.posts');
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
