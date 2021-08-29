<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Routing\Router;
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

Route::get('/', WelcomeController::class);

Route::group(['middleware' => 'auth'], function (Router $authRouter){
    $authRouter->get('/dashboard', DashboardController::class)->name('dashboard');

    $authRouter->resource('contacts', ContactController::class)->only('index');
    $authRouter->resource('upload-files', UploadFileController::class)->only('index');
});

require __DIR__.'/auth.php';
