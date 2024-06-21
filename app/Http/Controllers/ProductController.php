<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->query('search');

    if ($search) {
      $products = Product::where(
        'name', 'like', '%'.$search.'%'
      )->get();
    } else {
      $products = Product::all();
    }

    return response()->json($products);
  }

  public function store(Request $request)
  {
    $product = new Product;

    $product->name = $request->name;
    $product->price = $request->price;

    $product->save();

    return response()->json($product);
  }
}
