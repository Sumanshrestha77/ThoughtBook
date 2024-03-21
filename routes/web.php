<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    $posts = [];
    if (auth()->check()) {


        $posts = Post::all(); //from post model geting all the post
    }
    // $posts= Post::where('user_id', auth()->id())->get();
    return view('home', ['posts' => $posts]);
});
/*
Route::post('/register', function () {
    return 'thank you';
});*/
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

//here post Route is a class creating a instance of route for routing. 
/*post is method, and logout is the function that we implement in the Usercontorller*/
//route for all post related
Route::post('/create-post', [PostController::class, 'createPost']);

//here create-post is the action of the method
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);
