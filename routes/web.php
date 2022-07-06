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
    Route::get('admin/{user}/delete', [AdminController::class, 'destroyUser'])->name('admin.destroyUser');
    Route::get('/admin/perfil', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/actualizar-datos', [AdminController::class, 'editProfile'])->name('admin.editProfile');
    Route::get('/admin/contacto', [ContactoController::class, 'index'])->name('admin.contact');
    Route::delete('/admin/contacto/{id}', [ContactoController::class, 'destroy'])->name('admin.messageDestroy');
    Route::get('/admin/contacto/{mensaje}', [ContactoController::class, 'show'])->name('admin.message');
    route::get('/admin/contacto/unseen/{mensaje}', [ContactoController::class, 'unseen'])->name('admin.unseen');
    
    Route::get('/admin/{user}/editar', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{user}', [UserController::class, 'checkUpdate'])->name('admin.checkUpdate');
    Route::get('/admin/{user}/documentos', [DocumentController::class, 'documents'])->name('admin.documents');
    Route::delete('/admin/{user}/documentos/{documento}', [DocumentController::class, 'destroy'])->name('admin.documentDestroy');
    Route::get('/admin/{user}/nuevo-documento', [DocumentController::class, 'create'])->name('admin.createDocument');
    Route::post('/admin/{user}/nuevo-documento', [DocumentController::class, 'store'])->name('admin.createDocument');
    

    //User Routes
    Route::get('/user/itinerario', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/calendario', [UserController::class, 'calendario'])->name('user.calendario');
    Route::get('/user/pases-de-abordar', [UserController::class, 'pasesAbordar'])->name('user.pasesAbordar');
    Route::get('/user/informacion-covid', [UserController::class, 'infoCovid'])->name('user.infoCovid');
    Route::get('/user/tours-y-traslados', [UserController::class, 'tours'])->name('user.tours');
    Route::get('/user/descargar-archivo', [DocumentController::class, 'download'])->name('user.download');
    Route::get('/user/perfil', [UserController::class, 'perfil'])->name('user.profile');
    Route::get('/user/actualizar-datos', [UserController::class, 'editProfile'])->name('user.editProfile');

    Route::get('/user/posts/{posts}', [UserController::class, 'showDocument'])->name('user.showDocument');
    //Route::get('/user/{categoria}/{slugTitle}'. [UserController::class, 'index'])->name('user.postDetail');
    


});
