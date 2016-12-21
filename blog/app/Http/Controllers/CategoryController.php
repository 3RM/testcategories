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
	$category->posts()->delete();// удаляем посты из БД
        $category->delete();// удаляем саму категорию

        return redirect()->route('cat_admin');
    }
    
    public function edit(Category $category){
	return view('admin/edit', [
            'category' => $category,
        ]);
    }
    
     public function save(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('cat_admin');
    }
//    public function show_category(){
//	$posts = App\Category::find(3)->posts;
//	return view('welcome', [
//            'posts' => $posts,
//        ]);
//    }

}
