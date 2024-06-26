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

  public function store(Request $request)
  {
    $category = new Category;

    $category->name = $request->name;

    $category->save();

    return response()->json([
      'message' => 'Category created successfully.',
      'item' => $category
    ]);
  }

  public function update(Request $request)
  {
    $data = $request->all();

    Category::findOrFail($request->id)->update($data);

    return response()->json([
      'message' => 'Category updated successfully.'
    ]);
  }

  public function destroy($id)
  {
    Category::findOrFail($id)->delete();

    return response()->json([
      'message' => 'Category deleted successfully.'
    ]);
  }
}
