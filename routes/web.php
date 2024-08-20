<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/buttons', function () {
    return view('buttons');
});
// Route::get('/posts',[PostController::class,'index'])->name('posts.index');
// Route::get('/posts.create',[PostController::class,'create'])->name('posts.create');
// Route::post('/posts.create',[PostController::class,'store'])->name('posts.store');

// Route::get('/posts/{id}',[PostController::class,'show'])->name('posts.show')->where('id', '[0-9]+');
// Route::get('/posts/delete/{id}',[PostController::class,'delete'])->name('posts.delete')->where('id', '[0-9]+');
// Route::get('/posts/edit/{id}',[PostController::class,'edit'])->name('posts.edit')->where('id', '[0-9]+');

// Route::put('/posts.update/{id}',[PostController::class,'update'])->name('posts.update');



Route::resource('posts', PostController::class);
Route::post('posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::get('/posts/forceDelete/{id}',[PostController::class,'forceDelete'])->name('posts.forceDelete')->where('id', '[0-9]+');
