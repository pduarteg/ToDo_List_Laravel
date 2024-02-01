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

Route::get('/', function () {
    return view('tasks/index');
})->name('Start');

Route::post('/createtodo', [TodosController::class, 'store']);
