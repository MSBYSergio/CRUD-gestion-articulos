<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TagController;
use App\Http\Middleware\IsAdminMiddleware;
use App\Livewire\Article;
use App\Livewire\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('inicio');
Route::get('contacto', [ContactoController::class, 'index']) -> name('contacto.mostrar');
Route::post('contacto',[ContactoController::class,'procesar']) -> name('contacto.procesar');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('tags', TagController::class)->except('show')->middleware(IsAdminMiddleware::class);
    Route::get('user-articles', ArticleController::class)->name('user-articles');
});
