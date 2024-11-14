<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert; 

class OrderItemController extends Controller
{
    // Mostrar los elementos de una orden
    public function index(Order $order)
    {
        $orderItems = $order->items()->with('product')->paginate(4);
        return view('orderitems.index', compact('order', 'orderItems'));
    }

    // Mostrar formulario para agregar un nuevo elemento a la orden
    public function create(Order $order)
    {
        $products = Product::all(); // Obtener todos los productos disponibles
        return view('orderitems.create', compact('order', 'products'));
    }

    // Almacenar un nuevo elemento en la orden
    // Almacenar un nuevo elemento en la orden
    public function store(Request $request, Order $order)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
        ]);

        // Asignar explícitamente el order_id al crear un OrderItem
        $orderItem = new OrderItem([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'order_id' => $order->id, // Asignar el order_id
        ]);

        // Guardar el elemento de la orden
        $order->items()->save($orderItem);

        // Usar SweetAlert para mostrar la alerta de éxito
        Alert::success('Éxito', 'Elemento agregado a la orden')->flash();

        return redirect()->route('orderitems.index', $order);
    }


    // Mostrar el formulario para editar un elemento de la orden
    public function edit(Order $order, OrderItem $orderItem)
    {
        $products = Product::all(); // Get all products
        return view('orderitems.edit', compact('order', 'orderItem', 'products'));
    }


    // Actualizar el elemento de la orden
    public function update(Request $request, Order $order, OrderItem $orderItem)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
        ]);

        $orderItem->update($request->all());

        // Usar SweetAlert para mostrar la alerta de éxito
        Alert::success('Éxito', 'Elemento de la orden actualizado')->flash();

        return redirect()->route('orderitems.index', $order);
    }

    // Eliminar un elemento de la orden
    public function destroy(Order $order, OrderItem $orderItem)
    {
        $orderItem->delete();

        // Usar SweetAlert para mostrar la alerta de éxito
        Alert::success('Éxito', 'Elemento eliminado de la orden')->flash();

        return redirect()->route('orderitems.index', $order);
    }

    // Mostrar detalles de un elemento de la orden
    public function show(Order $order, OrderItem $orderItem)
    {
        return view('orderitems.show', compact('order', 'orderItem'));
    }
}
