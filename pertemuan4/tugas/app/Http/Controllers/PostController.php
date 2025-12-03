<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{// PostController.php
        public function index()
        {
            // Menggunakan with() untuk mengatasi N+1 Problem
            $posts = Post::with(['author', 'category'])->get();
            return view('posts', compact('posts'));
        }

        // Route Model Binding untuk single post page
        public function show(Post $post)
        {
            // Menggunakan with() untuk mengatasi N+1 Problem
            $post->load(['author', 'category']);
            return view('post', compact('post'));
        }

}
