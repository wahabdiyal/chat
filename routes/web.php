<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ChatsController;
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
include 'Admin.php';
include 'chat.php';

Route::get('/login', [MainController::class,'showView']);

Route::post('/login', [MainController::class,'loginUser']);


Route::middleware(['StatusMessage'])->group(function () {
Route::get('/', [ChatsController::class,'index']);
Route::get('messages', [ChatsController::class,'fetchMessages']);
Route::post('messages', [ChatsController::class,'sendMessage']);

Route::get('messagebox',[ChatsController::class,'messagebox']);
Route::get('logout',function(){
	 return session()->flush();
	});
});