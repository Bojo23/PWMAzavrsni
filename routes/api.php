<?php


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

//Javne rute
Route::post('/register',[authController::class,'register']);
Route::post('/login',[authController::class,'login']);
Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{id}',[ProductController::class,'show']);
Route::get('/products/search/{name}',[ProductController::class,'search']);



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
