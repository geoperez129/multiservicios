<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RatingController;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

/* LOGIN */
Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

/* REGISTRO NORMAL */
Route::get('/register', [AuthController::class, 'registerView'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

/* REGISTRO TÉCNICO */
Route::get('/register/technician', [AuthController::class, 'registerTechView'])->name('register.technician');
Route::post('/register/technician', [AuthController::class, 'registerTechnician'])->name('register.technician.submit');

/* LOGOUT (también dentro del middleware, pero aquí para tener el name) */
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* OTROS PÚBLICOS */
Route::get('/servicios', [ServiceController::class, 'index'])->name('services.index');
Route::get('/servicios/{id}/tecnicos', [TechnicianController::class, 'byService'])
    ->whereNumber('id')
    ->name('services.technicians');

Route::get('/acerca', [HomeController::class, 'about'])->name('about');
Route::get('/precios', [HomeController::class, 'prices'])->name('prices');

Route::get('/contactar-tecnico', [ContactController::class, 'form'])->name('contact.form');
Route::post('/contactar-tecnico', [ContactController::class, 'send'])->name('contact.send');


/*
|--------------------------------------------------------------------------
| RUTAS PROTEGIDAS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /* PERFIL USUARIO NORMAL */
    Route::get('/perfil', [AuthController::class, 'userProfile'])->name('user.profile');
    Route::get('/perfil/editar', [AuthController::class, 'editUser'])->name('user.edit');
    Route::post('/perfil/actualizar', [AuthController::class, 'updateUser'])->name('user.update');

    /* PERFIL TÉCNICO */
    Route::get('/perfil-tecnico', [TechnicianController::class, 'showProfile'])->name('technician.profile');
    Route::get('/perfil-tecnico/editar', [TechnicianController::class, 'editProfile'])->name('technician.profile.edit');
    Route::post('/perfil-tecnico/actualizar', [TechnicianController::class, 'updateProfile'])->name('technician.profile.update');

    /* CALIFICAR TÉCNICO */
    Route::post('/tecnicos/{technician}/calificar', [RatingController::class, 'store'])
        ->name('technicians.rate');
});
