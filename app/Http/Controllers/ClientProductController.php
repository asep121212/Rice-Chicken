<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ClientProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('client.product', compact('products'));
    }

    public function show(Product $product)
    {
        return view('client.detailproduct', compact('product'));
    }
}
