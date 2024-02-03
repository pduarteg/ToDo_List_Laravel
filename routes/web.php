<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\CategoriesController;

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

// se manda en la ruta una variable
Route::get('/edit/{id}', [TodosController::class, 'show'])->name('edit-todo');
Route::patch('/update/{id}', [TodosController::class, 'update'])->name('update-todo');
Route::delete('/delete/{id}', [TodosController::class, 'delete'])->name('delete-todo');

// traemos las categorías como recursos
Route::resource('categories', CategoriesController::class);