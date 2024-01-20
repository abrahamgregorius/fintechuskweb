<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::get();
        return view('admin.category', compact('categories'));
    }

    public function create() {
        return view('admin.categorycreate');
    }

    public function store(Request $request) {
        Category::create($request->all());
        return redirect('/categories')->with('status', 'Success');
    }

    public function edit($id) {
        $category = Category::find($id);
        return view('admin.categoryedit', compact('category'));
    }

    public function update(Request $request, string $id) {
        $category = Category::find($id);
        $category->update($request->all());
        return redirect('/categories');
    }

    public function destroy($id) {
        Category::find($id)->delete();
        return redirect()->back()->with('status', 'Success');
    }
}
