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
    return view('welcome');
});

Route::get('/write', function () {
    $title = '';
    $content = '';
    return view('index', compact('title', 'content'));
});

Route::post('/processing', [AiGptController::class, 'index']);

