<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HeaderController;

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
//Using controller as a function and adds a nick to the route in order to make easier the route management
Route::get('/', [HeaderController::class, 'index'])->name('header.index');

