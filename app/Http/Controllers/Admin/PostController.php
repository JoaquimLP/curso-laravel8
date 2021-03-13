<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate();
        return view("admin.post.index", compact("posts"));
    }

    public function create()
    {
        return view("admin.post.create");
    }

    public function store(StoreUpdatePost $request)
    {
        Post::create($request->all());

        return redirect()->route('post.index');
    }

    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('post.index');
        }

        return view("admin.post.show", compact("post"));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('post.index');
        }

        return view("admin.post.edit", compact("post"));
    }

    public function update(StoreUpdatePost $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('post.index');
        }

        $post->update($request->all());

        return redirect()->route('post.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('post.index');
    }

    public function search(Request $request)
    {
        $filters = $request->search;
        $posts = Post::where('title', 'LIKE', "%{$request->search}%")
            ->orWhere('content', 'LIKE', "%{$request->search}%")->orderBy('id', 'DESC')->paginate();

        return view("admin.post.index", compact("posts", "filters"));
    }
}
