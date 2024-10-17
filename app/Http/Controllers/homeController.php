<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class homeController extends Controller {



    public function __invoke(Request $request) {
        $posts = Post::with('user', 'category')
            ->when($request->query('query'), function (Builder $query) use ($request) {
                return $query->where('title', 'LIKE', '%' . $request->query('query') . '%');
            })

            ->when($request->query('category'), function (Builder $query) use ($request) {
                return $query->whereHas('category', function (Builder $query) use ($request) {

                    return $query->where('slug', $request->query('category'));
                });
            })
            ->latest()
            ->paginate(10);



        return view('techBlog.index', [
            'posts' => $posts,
            'categories' => Category::all()
        ]);
    }
}