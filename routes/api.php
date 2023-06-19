<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->group(function () {

    Route::get('/user', function () {

        return auth()->user();
    });
    
    Route::get('/companies/{id?}', [CompanyController::class, 'index']);

    Route::post('/addcompany', [CompanyController::class, 'create']);

    Route::delete('/deletecompany/{id}', [CompanyController::class, 'destroy']);

    Route::patch('/updatecompany/{id}', [CompanyController::class, 'update']);

});

Route::get('/categories/{category_id?}', [CategoryController::class, 'index']);

Route::post('/addcategory', [CategoryController::class, 'create']);

Route::delete('/deletecategory/{category_id}', [CategoryController::class, 'destroy']);

Route::patch('/updatecategory/{category_id}', [CategoryController::class, 'update']);