<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::get();
        return view('shop.index', compact('products'));
    }
    
    public function create() {
        $categories = Category::get();
        return view('shop.create', compact('categories'));
    }

    public function store(Request $request) {
        Product::create($request->all());
        return redirect('/')->with('status', 'Success');
    }
    
    public function edit($id) {
        $product = Product::find($id);
        $categories = Category::get();
        return view('shop.edit', compact('product', 'categories'));
    }

    public function update(Request $request, string $id) {
        $product = Product::find($id);
        $product->update($request->all());
        return redirect('/products');
    }
    
    public function destroy($id) {
        Product::find($id)->delete();
        return redirect('/')->with('status', 'Success');
    }

    
}
