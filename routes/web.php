<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
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
Route::resource('users', UserController::class);
Route::resource('likes', LikeController::class);
Route::resource('posts', PostController::class);

Route::post('userlogin',[UserController::class,'login']);
Route::get('userlogout',[UserController::class,'logout']);
Route::get('verify/{code}',[UserController::class,'verify']);
Route::get('register',[UserController::class,'register']);
Route::get('login',[UserController::class,'tologin']);
Route::post('ep/{id}',[PostController::class,'update']);
Route::post('epr/{id}',[UserController::class,'update']);
Route::post('like/{id}',[LikeController::class,'like']);
Route::get('delpost/{id}',[PostController::class,'destroy']);
Route::get('deluser/{id}',[UserController::class,'destroy']);