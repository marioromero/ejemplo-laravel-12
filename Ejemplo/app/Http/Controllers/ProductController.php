<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los productos
        $products = Product::all();

        //carga las categorías, para que en la vista de productos se pueda asociar un producto a una categoría
         $categories = Category::all();

        // Retornar la vista con los productos y categorías
        return view('products', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retornar la vista para crear un nuevo producto
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'category_id' => 'required|exists:categories,id', // Asegurarse de que la categoría existe
        ]);

        // Crear un nuevo producto
        Product::create($request->all());

        // Redirigir a la lista de productos con un mensaje de éxito
        return redirect()->route('products')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Eliminar el producto
        $product->delete();

        // Redirigir a la lista de productos con un mensaje de éxito
        return redirect()->route('products')->with('success', 'Producto eliminado exitosamente.');
    }
}
