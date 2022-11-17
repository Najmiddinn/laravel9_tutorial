<?php

namespace App\Http\Controllers\AppControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('app.post.create', [
            
        ]);
    }

   
    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $model = Post::create($data);
    }

   
    public function show(Post $post)
    {
        //
    }

    
    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
