<?php

use App\Http\Controllers\Todo_Controller;
use Illuminate\Support\Facades\Route;

Route::view('/','home')->name('todo.add');

Route::get('/all-todos', [Todo_Controller::class, 'all_todos'])->name('todo.all');

Route::post('/store-todo', [Todo_Controller::class, 'store_todo'])->name('todo.store');

Route::get('/edit-todo/{id}', [Todo_Controller::class, 'edit_todo'])->name('todo.edit');
Route::patch('/update-todo/{id}', [Todo_Controller::class, 'update_todo'])->name('todo.update');
Route::get('/status-update/{id}', [Todo_Controller::class, 'status_update'])->name('todo.status_update');
Route::get('/delete-todo/{id}', [Todo_Controller::class, 'delete_todo'])->name('todo.delete');
