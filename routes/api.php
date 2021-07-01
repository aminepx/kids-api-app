<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PdfApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


////API  Category
Route::get('allcat',[CategoryController::class,'mycategories']);
Route::post('addcat',[CategoryController::class,'store']);
Route::delete('delete/{id}',[CategoryController::class,'destroy']);
Route::post('update/{id}',[CategoryController::class,'update']);
Route::get('show/{id}',[CategoryController::class,'details']);

///// API PDF

Route::get('allmypdf', [PdfApiController::class , 'getAllPdf']);
Route::post('savepdf',[PdfApiController::class,'storeOnePdf']);
Route::delete('delete-pdf/{id}',[PdfApiController::class,'destroyOnepdf']);


