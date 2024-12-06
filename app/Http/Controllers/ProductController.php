<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'success' => true,
            'data' => ProductResource::collection($products),
            'message' => 'Products retrieved successfully.'
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'sku' => 'required|string',
            'categories' => 'required|array',
            'images' => 'required|array',
            'main_image' => 'required|array',
            'reviews' => 'required|array',
            'pricing' => 'required|array',
            'sizes' => 'required|array',
            'colors' => 'required|array',
            'stock' => 'required|array',
            'delivery' => 'required|array',
            'outstanding_features' => 'required|array',
            'washing_instructions' => 'required|array',
            'specifications' => 'required|array',
            'shipping' => 'required|array',
        ]);

        try {
            $validated['uuid'] = (string) Str::uuid();
            $product = Product::create($validated);
            return response()->json([
                'success' => true,
                'message' => 'Product created successfully.',
                'data' => new ProductResource($product),
            ], 201);
        } catch (\Exception $e) {
            \Log::error('Product creation failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => 'Product creation failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new ProductResource($product),
            'message' => 'Product retrieved successfully.'
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found.'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'sku' => 'sometimes|required|string',
            'categories' => 'sometimes|required|array',
            'images' => 'sometimes|required|array',
            'main_image' => 'sometimes|required|array',
            'reviews' => 'sometimes|required|array',
            'pricing' => 'sometimes|required|array',
            'sizes' => 'sometimes|required|array',
            'colors' => 'sometimes|required|array',
            'stock' => 'sometimes|required|array',
            'delivery' => 'sometimes|required|array',
            'outstanding_features' => 'sometimes|required|array',
            'washing_instructions' => 'sometimes|required|array',
            'specifications' => 'sometimes|required|array',
            'shipping' => 'sometimes|required|array',
        ], [
            'sku.unique' => 'This SKU already exists, please try using another SKU for your product.'
        ]);

        try {
            $product->update($validated);
            return response()->json([
                'success' => true,
                'data' => new ProductResource($product),
                'message' => 'Product updated successfully.'
            ], 200);
        } catch (\Exception $e) {
            \Log::error('Product update failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => 'Product update failed: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found.'
            ], 404);
        }

        try {
            $product->delete();
            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully.'
            ], 200);
        } catch (\Exception $e) {
            \Log::error('Product deletion failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => 'Product deletion failed: ' . $e->getMessage()
            ], 500);
        }
    }
}
