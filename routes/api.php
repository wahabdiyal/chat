<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('show_category',[CategoryController::class,'index']);

Route::get('show_device',[DeviceController::class,'index']);

Route::get('show',[CategoryController::class,'show']);

Route::get('show_device/{id}',[DeviceController::class,'show']);

Route::post('messages', [ChatsController::class,'sendMessage']);

Route::get('device',function(){
return \App\Models\Device::all();
});