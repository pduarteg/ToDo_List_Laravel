<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    /*INDEX: para mostrar todos los elementos
    store para guardar una tarea
    update par aactualizar
    delete para eliminar
    edit para mostrar el formulario*/

    public function store(Request $request){
        // El modelo es la base de datos (tabla);
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
        return redirect()->route('index')->with('succes','Tarea creada exitosamente.');
    }

    public function index(){
        // los dobles puntos es para acceder a un método estático
        $tasks = Todo::all();
        // saved tasks es la variable que manda la funcón index para usar en la vista
        return view('tasks/index', ['saved_tasks' => $tasks]);
    }

    // $id del parámetro es la variable mandada en la url
    public function show($id){
        $foundTask = Todo::find($id);
        // nota: to_show_task es como se llamó a la variable
        // por lo tanto así deberá usarse en la vista (show.blade.php en este caso).
        return view('tasks/show', ['to_show_task' => $foundTask]);
    }

    // title se mandó en el formulario e id a través de la ruta
    public function update(Request $request, $id){
        $foundTask = Todo::find($id);
        // Nota el objeto tiene la variable taskTitle al igual que en el método store.
        $foundTask->title = $request->taskTitle;
        $foundTask->save();

        // Esto imprime información respecto al objeto sea la tarea o la request.
        // dd($foundTask);
        // dd($request);

        // Hacer esto de abajo genera el problema de no pasar la variable "saved-tasks"
        // return view('tasks/show', ['to_show_task' => $foundTask]);
        return redirect()->route('index')->with('succes','Tarea actualizada.');
    }

    public function delete($id){
        $foundTask = Todo::find($id);
        $foundTask->delete();

        return redirect()->route('index')->with('succes','Tarea eliminada.');
    }
}
