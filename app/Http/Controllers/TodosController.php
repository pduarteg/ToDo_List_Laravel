<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    /*INDEX: para mostrar todos los elementos
    store para guardar una tarea
    update par aactualizar
    destroy para eliminar
    edit para mostrar el formulario*/

    public function store(Request $request){
        // el método validate hace que se cumplan los requerimientos
        $request->validate([
            // aquí indicamos que es obligatorio y un mínimo de 3 caracteres
            // se validará el dato en la solicitud (request)
            'taskTitle'=>'required|min:3'
        ]);

        $newTodo = new Todo;
        $newTodo->title = $request->taskTitle;
        $newTodo->save();

        // en route se debe redirigir al nombre asignado con "name" de la ruta
        return redirect()->route('Start')->with('succes','Tarea creada exitosamente.');
    }
}
