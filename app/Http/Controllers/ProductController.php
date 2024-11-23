<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert; 

class ProductController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        $products = Product::all();
        $products = Product::paginate(4); 
        return view('products.index', compact('products'));
    }

    // Mostrar el formulario para crear un nuevo producto
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.create', compact('categories', 'brands'));
    }

    // Guardar el nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        Product::create($request->all());

        // Usar SweetAlert para mostrar la alerta de éxito
        Alert::success('Éxito', 'Producto creado exitosamente.')->flash();

        return response()->json(['success' => true]);
    }

    // Mostrar detalles de un producto
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Mostrar el formulario para editar un producto
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.edit', compact('product', 'categories', 'brands'));
    }

    // Actualizar el producto
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $product->update($request->all());

        // Usar SweetAlert para mostrar la alerta de éxito
        Alert::success('Éxito', 'Producto actualizado exitosamente.')->flash();

        return response()->json(['success' => true]);
    }

    // Eliminar un producto
    public function destroy(Product $product)
    {
        $product->delete();

        // Usar SweetAlert para mostrar la alerta de éxito
        Alert::success('Éxito', 'Producto eliminado exitosamente.')->flash();

        return redirect()->route('products.index');
    }
}
