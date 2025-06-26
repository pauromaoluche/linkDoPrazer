<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\ChatController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Middleware\AuthenticateMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/auth', [AuthController::class, 'index'])->middleware('guest')->name('auth');
Route::get('/chat', [ChatController::class, 'index'])->middleware(AuthenticateMiddleware::class)->name('chat');