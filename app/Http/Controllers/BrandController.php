<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;  

class BrandController extends Controller
{
    // Mostrar todas las marcas
    public function index()
    {
        $brands = Brand::all();
        $brands = Brand::paginate(4); 
        return view('brands.index', compact('brands'));
    }

    // Mostrar formulario para crear una nueva marca
    public function create()
    {
        return view('brands.create');
    }

    // Almacenar una nueva marca
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Brand::create($request->all());

        // Usar SweetAlert para mostrar la alerta
        Alert::success('Éxito', 'Marca creada exitosamente')->flash();

        return redirect()->route('brands.index');
    }

    // Mostrar detalles de una marca
    public function show(Brand $brand)
    {
        return view('brands.show', compact('brand'));
    }

    // Mostrar formulario para editar una marca
    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    // Actualizar la marca
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $brand->update($request->all());

        // Usar SweetAlert para mostrar la alerta
        Alert::success('Éxito', 'Marca actualizada exitosamente')->flash();

        return redirect()->route('brands.index');
    }

    // Eliminar una marca
    public function destroy(Brand $brand)
    {
        $brand->delete();

        // Usar SweetAlert para mostrar la alerta
        Alert::success('Éxito', 'Marca eliminada exitosamente')->flash();

        return redirect()->route('brands.index');
    }
}
