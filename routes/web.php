<?php

use App\Http\Controllers\AudioController;
use App\Http\Controllers\AudioUrlController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\PdfController;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', function () {
    return view('welcome');
});



///// categories

Route::get('/cat', [DashController::class , 'feed'])->name('cat');
Route::delete('delete/{id}',[DashController::class,'destroy'])->name('delete');
Route::get('update/{id}', [DashController::class, 'updateForm'])->name('update');
Route::post('edited/{id}', [DashController::class, 'edit'])->name('edited');
Route::get('add',[DashController::class,'add'])->name('add');
Route::post('save',[DashController::class,'store'])->name('save');
Route::get('dash', function () {
    return view('pages.dash');
});

////// pdf files

Route::get('/all-pdf', [PdfController::class , 'getPdf'])->name('allpdf');
Route::get('add-pdf',[PdfController::class,'addPdf'])->name('add-pdf');
Route::post('save-pdf',[PdfController::class,'storePdf'])->name('save-pdf');
Route::delete('deletepdf/{id}',[PdfController::class,'destroypdf'])->name('deletepdf');



//////// audios


Route::get('/audios', [AudioController::class , 'myAudios'])->name('audios');
Route::get('add-audio',[AudioController::class,'addAudio'])->name('add-audio');
Route::post('save-audio',[AudioController::class,'save'])->name('save-audio');
Route::delete('delete/{id}',[AudioController::class,'destroy'])->name('delete');
Route::get('addurl/{id}',[AudioController::class,'addAudioUrl'])->name('addurl');
Route::get('duo', [AudioController::class , 'innerjoin']);


///// audiosUrl

Route::get('audiourl', [AudioUrlController::class , 'myAudioUrl'])->name('audiourl');
Route::post('save-url',[AudioUrlController::class,'saveUrl'])->name('save-url');
Route::delete('deleteurl/{id}',[AudioUrlController::class,'destroyurl'])->name('deleteurl');
