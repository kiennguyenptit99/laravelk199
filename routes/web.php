<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get("/test", [TestController::class, "Test"]);

Route::group(["prefix"=>"/login", "middleware"=>"checklogin"], function(){
    Route::get("/", [AuthController::class, "getLogin"]);
    Route::post("/", [AuthController::class, "postLogin"]);
});
Route::group(["prefix"=>"admin", "middleware"=>"checkadmin"], function(){

    Route::get("/", [AdminController::class, "index"]);
    Route::get("/logout", [AdminController::class, "logout"]);

    Route::group(["prefix"=>"product"], function(){
        Route::get("/", [ProductController::class, "index"]);
        Route::get("/create", [ProductController::class, "create"]);
        Route::post("/store", [ProductController::class, "store"]);
        Route::get("/edit/{id}", [ProductController::class, "edit"]);
        Route::post("/update/{id}", [ProductController::class, "update"]);
        Route::get("/delete/{id}", [ProductController::class, "delete"]);
    });
});
