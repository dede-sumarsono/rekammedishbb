<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\RekamController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/getdata',[RekamController::class, 'index']);
    Route::get('/show/{id}',[RekamController::class, 'show']);
    //CRUD
    Route::post('/create',[RekamController::class, 'store']);
    Route::post('/update/{id}',[RekamController::class, 'update']);
    Route::post('/destroy/{id}',[RekamController::class, 'destroy']);
    
    Route::post('/destroyuser/{id}',[AuthenticationController::class, 'destroyuser']);
    


    Route::get('/logout',[AuthenticationController::class,'logout']);
    Route::get('/me',[AuthenticationController::class,'me']);
    Route::get('/getalluser',[AuthenticationController::class,'getalluser']);
    Route::get('/getuser/{id}',[AuthenticationController::class,'getuser']);
    Route::get('/getdatarekammedis',[RekamController::class,'getdatarekammedis']);
    Route::get('/getallpasien',[RekamController::class,'getallpasien']);
    Route::get('/getdaftarepasien',[RekamController::class,'getdaftarepasien']);
    
});


Route::post('/login',[AuthenticationController::class,'login']);
Route::post('/register',[AuthenticationController::class,'register']);