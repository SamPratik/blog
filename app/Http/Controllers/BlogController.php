<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post as Post;

class BlogController extends Controller
{
    public function index() {
        $posts = Post::paginate(2);
        return view('blog.index', ['posts' => $posts]);
    }

    public function single($slug) {
        $post = Post::where('slug', $slug)->first();
        return view('blog.single', ['post' => $post]);
    }

}
