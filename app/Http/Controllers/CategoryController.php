<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index(Request $request)
  {
    $search = $request->query('search');

    if ($search) {
      $categories = Category::where(
        'name', 'like', $search
      )->get();
    } else {
      $categories = Category::all();
    }

    return response()->json($categories);
  }
}
