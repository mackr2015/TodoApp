<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Return from our ToDo COntroller
Route::get('/', [TodoController::class, 'index'])->name('todo');

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::post('/todo', [TodoController::class, 'saveTodo']);

Route::delete('/todo/{todo}', [TodoController::class, 'deleteTodo'])->name('todo.delete');
