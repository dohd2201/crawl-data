<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CrawlController extends Controller
{
    public function index() {
        $posts = Post::orderBy('id', 'DESC')->paginate(1);
        return view('welcome', compact('posts'));
    }
}
