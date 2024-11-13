<?php

namespace App\Http\Controllers;

use App\Models\Accesorio; // Corregir el nombre del modelo a singular
use Illuminate\Http\Request;

class AccesorioController extends Controller
{
    /**
     * Mostrar todos los accesorios con paginación.
     */
    public function index()
    {
        // Paginación de 5 accesorios por página
        $accesorios = Accesorio::paginate(5);
        return view('accesorios.index', compact('accesorios'));
    }

    /**
     * Mostrar el formulario para crear un nuevo accesorio.
     */
    public function create()
    {
        return view('accesorios.create');
    }

    /**
     * Almacenar un nuevo accesorio en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'tipo' => 'required|string|max:50',
        ]);

        // Crear el accesorio en la base de datos
        Accesorio::create($request->all());

        // Redirigir a la lista de accesorios con mensaje de éxito
        return redirect()->route('accesorios.index')->with('success', 'Accesorio creado con éxito.');
    }

    /**
     * Mostrar el formulario para editar un accesorio.
     */
    public function edit($id)
    {
        // Obtener el accesorio a editar
        $accesorio = Accesorio::findOrFail($id);
        return view('accesorios.edit', compact('accesorio'));
    }

    /**
     * Actualizar un accesorio en la base de datos.
     */
    public function update(Request $request, $id)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'tipo' => 'required|string|max:50',
        ]);

        // Obtener el accesorio a actualizar
        $accesorio = Accesorio::findOrFail($id);

        // Actualizar los campos del accesorio
        $accesorio->update($request->all());

        // Redirigir con mensaje de éxito
        return redirect()->route('accesorios.index')->with('success', 'Accesorio actualizado con éxito.');
    }

    /**
     * Eliminar un accesorio de la base de datos.
     */
    public function destroy($id)
    {
        // Buscar el accesorio por id
        $accesorio = Accesorio::findOrFail($id); // Cambiar a "Accesorio"

        // Eliminar el accesorio
        $accesorio->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('accesorios.index')->with('success', 'Accesorio eliminado con éxito.');
    }
}
