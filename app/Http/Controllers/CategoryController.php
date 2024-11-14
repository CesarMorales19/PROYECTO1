<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert; 

class CategoryController extends Controller
{
    // Mostrar todas las categorías
    public function index()
    {
        $categories = Category::all();
        $categories = Category::paginate(4); 
        return view('categories.index', compact('categories'));
    }

    // Mostrar el formulario para crear una nueva categoría
    public function create()
    {
        return view('categories.create');
    }

    // Almacenar una nueva categoría
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Crear la categoría
        Category::create($validated);

        // Usar SweetAlert para mostrar la alerta
        Alert::success('Éxito', 'Categoría creada exitosamente')->flash();

        // Redirigir al listado de categorías
        return redirect()->route('categories.index');
    }

    // Mostrar una categoría específica
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // Mostrar el formulario para editar una categoría
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Actualizar una categoría existente
    public function update(Request $request, Category $category)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Actualizar la categoría
        $category->update($validated);

        // Usar SweetAlert para mostrar la alerta
        Alert::success('Éxito', 'Categoría actualizada exitosamente')->flash();

        // Redirigir al listado de categorías
        return redirect()->route('categories.index');
    }

    // Eliminar una categoría
    public function destroy(Category $category)
    {
        // Eliminar la categoría
        $category->delete();

        // Usar SweetAlert para mostrar la alerta
        Alert::success('Éxito', 'Categoría eliminada exitosamente')->flash();

        // Redirigir al listado de categorías
        return redirect()->route('categories.index');
    }
}
