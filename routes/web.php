<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UserController,AdminController,PostController}; 
use App\Models\{User,Admin,Post};  

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
//usúarios 
Route::resource('/posts',PostController::class)->middleware('auth')->except('show');       
Route::get('/posts/{id}',[PostController::class,'show'])->name('posts.show');
Route::get('/',[PostController::class,'index'])->name('web.search');
Route::get('/dashboard_user',[PostController::class,'dashboard'])->middleware('auth')->name('posts.dashboard');  
Route::get('/view_user/{id}', [PostController::class, 'view_user'])->name('view_user');
Route::get('/online-user', [App\Http\Controllers\UserController::class, 'index'])->name('online-users');


//adm
 
    Route::resource('/admin',AdminController::class)->middleware('isAdmin');
    Route::get('pesquisa',[AdminController::class,'index'])->middleware('isAdmin')->name('admin.search');       
    Route::get('tabela_adm',[AdminController::class,'table'])->middleware('isAdmin')->name('admin.tabela');       
    Route::get('/posts_user/{id}',[AdminController::class,'sobre'])->middleware('isAdmin')->name('admin.sobre');         
    Route::get('/dashboard ',[AdminController::class,'dashboard'])->middleware('isAdmin')->name('admin.dashboard');  
 
 