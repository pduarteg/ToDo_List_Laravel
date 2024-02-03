<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Nota: usar app con mayúscula, de lo contrario no se reconoce la ruta.
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories/index', ['sent_categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Para guardar registros
        echo "what? 1";
        $request->validate([
            // aquí validamos las columnas
            // las columnas se crean en la migración
            // internamente en laravel usaremos las variables
            // asignadas aqui (parte izquierda) para los objetos request
            'name' => 'required|unique:categories|max:255',
            'categoryColor' => 'required|max:7'
        ]);

        //dd($request);
        $new_category = new Category;
        $new_category->name = $request->name;
        $new_category->color = $request->categoryColor;
        $new_category->save();

        return redirect()->route('categories.index')->with('succes', 'Nueva categoría agregada.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $found_category = Category::find($id);
        //dd($found_category);
        return view('categories.show', ['sent_category' => $found_category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $found_category = Category::find($id);
        $found_category->name = $request->categoryName;
        $found_category->color = $request->categoryColor;

        $found_category->save();

        return redirect()->route('categories.index')->with('succes', 'Categoría actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $found_category = Category::find($id);
        $found_category->delete();

        return redirect()->route('categories.index')->with('succes', 'Categoría eliminada');
    }
}
