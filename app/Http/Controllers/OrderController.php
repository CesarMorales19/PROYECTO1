<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert; 
use App\Models\Usuario;

class OrderController extends Controller
{
    // Mostrar todas las órdenes
    public function index()
    {
        $orders = Order::with('user', 'items')->get();
        $orders = Order::paginate(4); 
        return view('orders.index', compact('orders'));
    }

    // Mostrar formulario para crear una nueva orden
    public function create()
    {
        $users = Usuario::all(); 

    // Pasar los usuarios a la vista
        return view('orders.create', compact('users'));
    }

    // Almacenar una nueva orden
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        // Crear la orden
        $order = Order::create($request->all());

        // Usar SweetAlert para mostrar la alerta de éxito
        Alert::success('Éxito', 'Orden creada exitosamente')->flash();

        return redirect()->route('orders.index');
    }

    // Mostrar detalles de una orden
    public function show(Order $order)
    {
        $order->load('user', 'items');
        return view('orders.show', compact('order'));
    }

    // Mostrar formulario para editar una orden
    public function edit(Order $order)
    {
        $users = Usuario::all(); 
        return view('orders.edit', compact('order', 'users'));
    }

    // Actualizar la orden
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        // Actualizar la orden
        $order->update($request->all());

        // Usar SweetAlert para mostrar la alerta de éxito
        Alert::success('Éxito', 'Orden actualizada exitosamente')->flash();

        return redirect()->route('orders.index');
    }

    // Eliminar una orden
    public function destroy(Order $order)
    {
        // Eliminar la orden
        $order->delete();

        // Usar SweetAlert para mostrar la alerta de éxito
        Alert::success('Éxito', 'Orden eliminada exitosamente')->flash();

        return redirect()->route('orders.index');
    }
}
