<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class singleBlogController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Post $post) {
        return view('techBlog.singleBlog', compact('post'));
    }
}
