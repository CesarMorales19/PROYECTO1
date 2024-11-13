<?php
namespace App\Http\Controllers;

use App\Models\Accesorio;
use Illuminate\Http\Request;

class AccesorioController extends Controller
{
    // Mostrar todos los accesorios (con paginación)
    public function index()
    {
        $accesorios = Accesorio::paginate(5); 
        return view('accesorios.index', compact('accesorios'));
    }

    // Mostrar formulario para crear un nuevo accesorio
    public function create()
    {
        return view('accesorios.create');
    }

    // Guardar un nuevo accesorio
    public function store(Request $request)
    {
        // Validación de los campos
        $this->validateRequest($request);

        // Crear un nuevo accesorio con los datos del formulario
        Accesorio::create($request->only(['nombre', 'descripcion', 'precio', 'tipo']));

        // Redirigir a la lista de accesorios con mensaje de éxito
        return redirect()->route('accesorios.index')->with('success', 'Accesorio creado con éxito.');
    }

    // Mostrar formulario para editar un accesorio existente
    public function edit($id)
    {
        $accesorio = Accesorio::findOrFail($id);
        return view('accesorios.edit', compact('accesorio'));
    }

    // Actualizar un accesorio existente
    public function update(Request $request, $id)
    {
        // Validación de los campos
        $this->validateRequest($request);

        // Buscar el accesorio por ID y actualizarlo
        $accesorio = Accesorio::findOrFail($id);
        $accesorio->update($request->only(['nombre', 'descripcion', 'precio', 'tipo']));

        // Redirigir a la lista de accesorios con mensaje de éxito
        return redirect()->route('accesorios.index')->with('success', 'Accesorio actualizado con éxito.');
    }

    // Eliminar un accesorio
    public function destroy($id)
    {
        // Encontrar el accesorio o fallar si no existe
        $accesorio = Accesorio::findOrFail($id);
    
        // Eliminar el accesorio
        $accesorio->delete();
    
        // Redirigir con mensaje de éxito
        return redirect()->route('accesorios.index')->with('success', 'Accesorio eliminado con éxito.');
    }

    protected function validateRequest(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'tipo' => 'required|string|max:50',
        ]);
    }
}
