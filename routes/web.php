<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//INICIO
Route::get('/', HomeController::class)->name('home');
//**** */

//AUTH / REGISTER
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

//AUTH / LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// LOGOUT
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// RUTAS PARA EL PERFIL
Route::get('/edtiar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/edtiar-perfil', [PerfilController::class, 'store'])->name('perfil.store');

//PERFIL
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index'); //PERFIL CON TODOS LOS POST
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create'); // CREACION DE UN POST
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show'); // MOSTRAR POST
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// COMENTARIOS de POST
Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store'); //COMENTARIO EN EL POST

// IMAGENES EN EL POST
Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store'); // GUARDAR IMAGENES


// LIKES a los POST
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');

// SIGUIENDO USUARIOS
Route::post('{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');