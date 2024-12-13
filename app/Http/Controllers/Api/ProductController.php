<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Exception;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return response()->json([
            'status' => true,
            'data' => ['products' => $products]
        ]);
    }

    public function store(ProductRequest $request)
    {

        try {
            $product = new Product;
            $product->name = $request->get('name');
            $product->price = $request->get('price');
            $product->stock = $request->get('stock');
        } catch (Exception $e) {
            $message = $e->getMessage();
            //dd($message);
            exit;
        }
        $product->save();
        return response()->json([
            'status' => true,
            'message' => "Product Created successfully!",
            'product' => $product
        ], 200);
    }

    public function update(ProductRequest $request, Product $product)
    {

        try {
            $product->name = $request->get('name');
            $product->price = $request->get('price');
            $product->stock = $request->get('stock');
        } catch (Exception $e) {
            $message = $e->getMessage();
            //dd($message);
            exit;
        }
        $product->update();
        return response()->json([
            'status' => true,
            'message' => "Product Updated successfully!",
            'product' => $product
        ], 200);
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
        } catch (Exception $e) {
            $message = $e->getMessage();
            //dd($message);
            exit;
        }
        return response()->json([
            'status' => true,
            'message' => "Product Deleted successfully!",
        ], 200);
    }
}
