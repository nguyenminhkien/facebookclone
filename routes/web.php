<?php

use App\Models\User;
use App\Models\InsertModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InsertController;

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
    return view('welcome');
});


//Route::view('/welcome', 'welcome');
//Route::view('/welcome', 'welcome', ['name' => 'Taylor']);
/*Route::get('/user/{id}', function ($id) {
    return 'User '.$id;
}); */


Route::get('/users/{user}', function (User $user) {
    return 'User: '.$user->email .' name: '.$user->name;
});



//Route::get('/user', [UserController::class,'index']);

//Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('heloo', function () {
    return view('post');
});


//Route::get('insert','App\Http\Controllers\InsertController@insertform');
//Route::post('create','App\Http\Controllers\InsertController@insert_data');
Route::get('/image-upload', [InsertController::class, 'createForm']);

Route::post('/image-upload', [InsertController::class, 'fileUpload'])->name('imageUpload');

Route::get('/index', [UserController::class, 'index'] );

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Route::get('/hinhanh/{image}', function (InsertModel $image) {
//     return 'ID: '.$image->id .' name: '.$image->name.'path: '.$image->image_path;
// });

Route::get('/hinhanh/{name}', function ( $name){
    $hinhanh = file_get_contents(__DIR__."/../public/uploads/{$name}");
    return view('hinhanh',[
        'hinhanh' => $hinhanh
    ]);
});

Route::get('posts/{post}', function($slug) {
    $profile = file_get_contents(__DIR__."/../resources/views/posts/{$slug}.html");
    return view('post',[
        'post' => $profile
    ]);

});







