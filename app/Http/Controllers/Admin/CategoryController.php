<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory()
    {
        return view('dashboard.createCategory');
    }
    public function storeCategory(Request $request)
    {
        // validation 
        $request->validate([
            'name' => 'required|string|max:255|min:2|unique:categories,name',
        ]);
        Category::create([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.getCategories')->with('success', 'Category created successfully');
    }
    public function getCategories()
    {
        $categories = Category::all();
        return view('dashboard.categories', compact('categories'));
    }
    public function deleteCategory($id)
    {
        $category = Category::findorFail($id);
        $category->delete();
        return redirect()->route('admin.getCategories')->with('success', 'Category deleted successfully');
    }
    public function editCategory($id)
    {
        $category = Category::findorFail($id);
        return view('dashboard.editCategory', compact('category'));
    }
    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:2|unique:categories,name,' . $id,
        ]);
        $category = Category::findorFail($id);
        $category->update([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.getCategories')->with('success', 'Category updated successfully');
    }
}
