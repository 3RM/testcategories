<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;

class CategoryController extends Controller {

    public function index() {
        $categories = Category::latest()->get();
        return view('admin/categories', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect()->route('cat_admin');
    }

    public function destroy(Category $category) {
        $category->delete();

        return redirect()->route('cat_admin');
    }

}
