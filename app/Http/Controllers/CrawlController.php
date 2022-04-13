<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CrawlController extends Controller
{
    public function index() {
        $post = Post::first();
        $categories = Post::paginate(5);
        return view('welcome', compact('post', 'categories'));
    }

    public function select($id) {
        $post = Post::find($id);
        $categories = Post::paginate(5);
        return view('welcome', compact('post', 'categories'));
    }
}
