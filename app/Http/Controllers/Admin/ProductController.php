<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function createProduct()
    {
        $categories = Category::all();
        return view('dashboard.createProduct', compact('categories'));
    }
    public function storeProduct(Request $request)
    {
        // validation
        $request->validate([
            'name' => 'required|string|max:255|min:2|unique:products,name',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->has('category_id')) {
            $product = Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'image' => $request->file('image')->store('uploads/products', 'public'),

            ]);
        }
        return redirect()->route('admin.getProducts')->with('success', 'Product created successfully');
    }
    public function getProducts()
    {
        $products = Product::paginate(5);
        return view('dashboard.products', compact('products'));
    }
    public function deleteProduct($id)
    {
        $product = Product::findorFail($id);
        // delete image
        if ($product->image) {
            unlink(public_path('storage/' . $product->image));
        }
        $product->delete();
        return redirect()->route('admin.getProducts')->with('success', 'Product deleted successfully');
    }
    public function editProduct($id)
    {
        $product = Product::findorFail($id);
        $categories = Category::all();
        return view('dashboard.updateProduct', compact('product', 'categories'));
    }
    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // البيانات الأساسية
        $data = [
            'name'        => $request->name,
            'price'       => $request->price,
            'quantity'    => $request->quantity,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ];

        // لو في صورة جديدة
        if ($request->hasFile('image')) {
            // امسح الصورة القديمة
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            // خزّن الصورة الجديدة
            $data['image'] = $request->file('image')->store('uploads/products', 'public');
        }

        // تحديث المنتج
        $product->update($data);

        return redirect()->route('admin.getProducts')->with('success', 'Product updated successfully');
    }
}
