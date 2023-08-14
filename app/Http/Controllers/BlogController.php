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

    public function show(int $blogId) {
        $blog = Blog::find($blogId);
        return $blog;
    }

    public function save(Request $request, $id = null)
    {
        if ($id) {
            // Actualizar un blog existente
            $blog = Blog::findOrFail($id);
            $blog->update($request->all());
        } else {
            // Crear un nuevo blog
            $blog = Blog::create($request->all());
        }
        return ['status'=>1];
    }
}
