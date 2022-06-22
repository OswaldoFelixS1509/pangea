<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HeaderController;
use App\http\Controllers\ContactoController;
use App\http\Controllers\RegisterController;
use App\http\Controllers\LoginController;
use App\http\Controllers\AdminController;
use App\http\Controllers\UserController;
use App\http\Controllers\DocumentController;


//Using controller as a function and adds a nick to the route in order to make easier the route management
Route::get('/', [HeaderController::class, 'index'])->name('header.index');
Route::get('/contacto', [HeaderController::class, 'contact'])->name('header.contact');
//This route is used to post the contact message in the database.
//They have the same name but the route is selected by the method
Route::post('/contacto', [ContactoController::class, 'store'])->name('header.contact');

//Login routes
Route::get('/login', [LoginController::class, 'show'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.auth'); 
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');


//All routes that requires a user to be logged needs to be here in order to protect access
Route::group(['middleware'=>['AuthCheck']], function(){
      
    //Admin routes
    Route::get('/admin/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/admin/register', [RegisterController::class, 'register'])->name('register.index');
      
    
    Route::get('/admin/control', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/perfil', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/contacto', [ContactoController::class, 'show'])->name('admin.contact');
    Route::get('/admin/{user}/editar', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{user}', [UserController::class, 'checkUpdate'])->name('admin.checkUpdate');
    Route::get('/admin/{user}/documentos', [DocumentController::class, 'documents'])->name('admin.documents');
    Route::delete('/admin/{user}/documentos/{documento}', [DocumentController::class, 'destroy'])->name('admin.documentDestroy');
    Route::get('/admin/{user}/nuevo-documento', [DocumentController::class, 'create'])->name('admin.createDocument');
    Route::post('/admin/{user}/nuevo-documento', [DocumentController::class, 'store'])->name('admin.createDocument');
    
    //User Routes
    Route::get('/user/itinerario', [UserController::class, 'index'])->name('user.index');
    


});
