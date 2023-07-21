<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.productsIndex', ['products' => $products]);
    }

    public function getProducts()
    {
        $products = Product::with('category')->get();
        return response()->json($products);
    }

    public function show($id)
    {
    }

    public function create()
    {
        return view("products.productsCreate");
    }

    public function store(Request $request)
    {
    }

    public function edit($id)
    {
        return view('products.productsEdit', ['id' => $id]);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        echo "destroy";
    }
}
