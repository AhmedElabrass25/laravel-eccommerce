<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        if ($products != null) {
            return ProductResource::collection($products);
        } else {
            return response()->json(['message' => 'No products found'], 404);
        }
    }
    public function productDetails($id)
    {
        $product = Product::find($id);
        if ($product != null) {
            return new ProductResource($product);
        } else {
            return response()->json(['message' => 'No product found'], 404);
        }
    }
    public function storeProduct(Request $request)
    {
        //   validation
        $errors = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:2|unique:products,name',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        if ($errors->fails()) {
            return response()->json(['error' => $errors->errors()], 422);
        }
        $image = $request->file('image')->store('uploads/products', 'public');
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $image,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);
        // return new ProductResource($product);
        return response()->json(['message' => 'Product created successfully'], 201);
    }
    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return response()->json(['message' => 'No product found'], 404);
        }
        //   validation
        $errors = Validator::make($request->all(), [
            'name' => 'required|string|max:255|min:2|unique:products,name',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        if ($errors->fails()) {
            return response()->json(['error' => $errors->errors()], 422);
        }
        if ($request->hasFile('image')) {
            // امسح الصورة القديمة
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $image = $request->file('image')->store('uploads/products', 'public');
        } else {
            $image = $product->image;
        }
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $image,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);
        return response()->json(['message' => 'Product Updated successfully', 'product' => new ProductResource($product)], 201);
    }
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return response()->json(['message' => 'No product found'], 404);
        }
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
}
