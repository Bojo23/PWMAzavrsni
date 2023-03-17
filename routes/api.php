<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\authController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//Route::resource('products',ProductController::class);


//Javne rute za login i register
Route::post('/register',[authController::class,'register']);
Route::post('/login',[authController::class,'login']);


//Javne rute za proizvod
Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{id}',[ProductController::class,'show']);
Route::get('/products/search/{name}',[ProductController::class,'search']);
Route::get('/products123',[ProductController::class,' priceGreaterThan10']);

//Javne rute za basket
Route::post('/baskets',[BasketController::class,'store']);
Route::get('/baskets',[BasketController::class,'index']);
Route::delete('/baskets/{id}',[BasketController::class,'destroy']);
Route::put('/baskets/{id}',[BasketController::class,'update']);
Route::get('/baskets/{id}',[BasketController::class,'show']);


//Javne rute za grupe
Route::post('/grupas',[GroupController::class,'store']);
Route::get('/grupas',[GroupController::class,'index']);
Route::delete('/grupas/{id}',[GroupController::class,'destroy']);
Route::put('/grupas/{id}',[GroupController::class,'update']);
Route::get('/grupas/{id}',[GroupController::class,'show']);

Route::get('/productscount/{group_id}',[ProductController::class,'countProducts']);

//Zasticene rute
Route::group(['middleware' =>['auth:sanctum']], function () {

    Route::post('/products',[ProductController::class,'store']);
    Route::put('/products/{id}',[ProductController::class,'update']);
    Route::delete('/products/{id}',[ProductController::class,'destroy']);
    Route::post('/logout',[authController::class,'logout']);

});




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
