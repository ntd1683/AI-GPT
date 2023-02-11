<?php

use App\Http\Controllers\AiGptController;
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
    return view('index');
});
Route::get('/test',[AiGptController::class,'test']);

Route::post('/processing', [AiGptController::class, 'index'])->name('processing');

