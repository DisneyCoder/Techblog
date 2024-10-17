<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('admin.post.index', [
            'posts' => Post::with('user', 'category')->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin.post.create', [
            'categories' => Category::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request) {
        $validated = $request->validated();
        $validated['slug'] = str($validated['title'])->slug();

        $post = Auth::user()->posts()->create($validated);

        if ($post) {
            flash()->success('Post Added Successfully')->flash();
            return redirect()->route('admin.posts.index');
        }


        flash()->addError('Post not added successfully.');
        return back();
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post) {

        $categories = Category::latest()->get();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post) {
        $validated = $request->validated();

        if ($validated['title'] !== $post['title']) {
            $validated['slug'] = str($request->validated('title'))->slug();
        }
        $post->updateOrFail($validated);

        flash()->success('Post Updated Successfully')->flash();
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post) {
        $post->delete();
        flash()->success('Post Deleted Successfully')->flash();
        return Redirect()->route('admin.posts.index');
    }
}