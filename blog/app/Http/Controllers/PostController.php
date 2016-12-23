<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;

class PostController extends Controller {

    public function index() {
        $posts = Post::latest()->get();
        $categories = Category::latest()->get();
        return view('admin/posts', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required',
        ]);
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        return redirect()->route('post_admin');
    }

    public function destroy(Post $post) {
        $post->delete();

        return redirect()->route('post_admin');
    }
	
	public function edit(Post $post){
		
		return view('admin/editpost', [
				'post' => $post,
			]);
    }
    
     public function save(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:255',
			'content' => 'required',
        ]);
        $post = Post::find($request->id);
        $post->title = $request->title;
		$post->content = $request->content;
		$post->category_id = $request->category_id;
        $post->save();
        return redirect()->route('post_admin');
    }

}
