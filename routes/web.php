<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;


Route::get('/', [TodoController::class, 'index'])->name('todos.index');
Route::post('/store', [TodoController::class, 'store'])->name('todos.store');
Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('todos.edit');
Route::post('/update/{id}', [TodoController::class, 'update'])->name('todos.update');
Route::post('/delete/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');
