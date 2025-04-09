<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// route::get('/', [HomeController::class, 'index']);
// route::get('/contact', [HomeController::class, 'contact']);
Route::get('/', [HomeController::class, 'landingpage']);
route::get('/landingpage', [HomeController::class, 'landingpage']);
route::get('/login', [HomeController::class, 'login']);
route::get('/register', [HomeController::class, 'register']);
route::get('/dashboard', [HomeController::class, 'dashboard']);