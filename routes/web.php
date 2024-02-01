<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

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

/* se está llamando a un método estático
eso significan los :: */

// Esto era temporal antes de la existencia del método index quien
// devolvía la vista "tasks/index"

// Route::get('/', function () {
//     return view('tasks/index');
// })->name('Start');

Route::get('/', [TodosController::class, 'index'])->name('index');
Route::post('/', [TodosController::class, 'store'])->name('add-todo');
Route::patch('/', [TodosController::class, 'index'])->name('todos-edit');
Route::delete('/', [TodosController::class, 'delete'])->name('delete-todos');