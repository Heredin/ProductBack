<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Exception;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $products = Product::get();
        return view("admin.products.index", compact('products'));
    }

    public function create()
    {
        return view("admin.products.create");
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
        return redirect()->route('products.index');
    }
    public function edit($id)
    {
        $product = Product::whereId($id)->first();
        return view("admin.products.edit", \compact('product'));
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
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
