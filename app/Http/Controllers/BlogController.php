<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index() {
        $posts = Blog::latest()->get();
        return $posts;
    }

    public function show(number $postId) {
        // return view('posts.show', compact('post'));
    }
}
