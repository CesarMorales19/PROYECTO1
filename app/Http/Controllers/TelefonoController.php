<?php

namespace App\Http\Controllers;

use App\Models\Telefono;
use Illuminate\Http\Request;

class TelefonoController extends Controller
{
    public function index()
    {
        $telefonos = Telefono::paginate(5);
        return view('telefonos.index', compact('telefonos'));
    }

    public function create()
    {
        return view('telefonos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Telefono::create($request->all());

        return redirect()->route('telefonos.index');
    }

    public function show($id)
    {
        $telefono = Telefono::findOrFail($id);
        return view('telefonos.show', compact('telefono'));
    }

    public function edit($id)
    {
        $telefono = Telefono::findOrFail($id);
        return view('telefonos.edit', compact('telefono'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $telefono = Telefono::findOrFail($id);
        $telefono->update($request->all());

        return redirect()->route('telefonos.index');
    }

    public function destroy($id)
    {
        $telefono = Telefono::findOrFail($id);
        $telefono->delete();

        return redirect()->route('telefonos.index');
    }
}
