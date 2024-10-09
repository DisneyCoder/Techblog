<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class homeController extends Controller {



    public function __invoke(Request $request) {
        $posts = Post::when($request->query('query'), function (Builder $query) use ($request) {
            return $query->where('title', 'LIKE', '%' . $request->query('query') . '%');
        })
            ->latest()
            ->paginate(10);



        return view('techBlog.index', [
            'posts' => $posts,
            'categories' => Category::all()
        ]);
    }
}
