<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Your code to retrieve and display the list of resources
        // $products = Product::all();
        $products = Product::with('category')->get();


        // Pass the products data to the "products.index" Blade file
        return view('products.productsIndex', ['products' => $products]);
    }

    // public function show($id)
    // {
    //     // Your code to retrieve and display the details of the resource with the given ID
    // }

    public function create()
    {
        // Your code to display the form for creating a new resource
        return view("products.productsCreate");
    }

    // public function store(Request $request)
    // {
    //     // Your code to validate the input, create the new resource, and store it in the database
    // }

    public function edit($id)
    {
        // Your code to retrieve the resource with the given ID and display the edit form
        return view('products.productsEdit', ['id' => $id]);
    }

    // public function update(Request $request, $id)
    // {
    //     // Your code to validate the input, update the resource with the given ID, and store the changes in the database
    // }

    public function destroy($id)
    {
        // Your code to delete the resource with the given ID from the database
        echo "destroy";
    }
}
