<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HeaderController;
use App\http\Controllers\ContactoController;
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

Route::get('/contacto', [HeaderController::class, 'contact'])->name('header.contact');
//This route is used to post the contact message in the database.
//They have the same name but the route is selected by the method
Route::post('/contacto', [ContactoController::class, 'store'])->name('header.contact');

