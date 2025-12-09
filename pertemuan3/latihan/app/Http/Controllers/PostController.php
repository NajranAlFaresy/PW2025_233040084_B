<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with(['author', 'category'])->get();
        return view('posts', compact('posts'));

    }

    // Route Model Binding untuk single post page
    public function show(Post $post)
    {
        // Menggunakan with() untuk mengatasi N+1 Prooblem
        $post->load(['author', 'category']);
        return view('posts', compact('post'));
    }
}