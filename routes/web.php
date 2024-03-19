<?php

use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, "index"]);

Route::get('/photo/ajouter', [UserController::class, "ajouter_photo"]);
Route::post('/photo/ajouter-submit', [UserController::class, "ajouter_photo_submit"]);

Route::get('/photo/modifier', [UserController::class, "modifier_photo"]);
Route::post('/photo/modifier-submit', [UserController::class, "modifier_photo_submit"]);

Route::get('/photo/supprimer', [UserController::class, "supprimer_photo"]);