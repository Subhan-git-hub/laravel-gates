<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::view('/login','login')->name('login');



Route::post('/loginSave',[UserController::class,'login'])->name('loginSave');


Route::get('/index',[UserController::class,'index'])
->name('index')->middleware(['auth']);

Route::get('/logout',[UserController::class,'logout'])->name('logout');

// Route::get('/index',[UserController::class,'index'])
// ->name('index')->middleware(['can:Admin'],['auth']);
//means only admin can access this page
//by using['can:Admin'] now only when the gate condition in appServiceProvider will be true, that means the user is admin only then he can view this page else an error will come if any reader tries to access this page

Route::get('/profile/{id}', [UserController::class, 'profile'])
->name('profile')->middleware(['auth']);
//we have used laravel automatic ['auth'] checking system

Route::get('/posts/{id}',[UserController::class,'posts'])->name('posts');

Route::get('/update.post/{id}',[UserController::class,'update'])->name('update.post');




    
    







