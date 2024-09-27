<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Flasher\Prime\FlasherInterface;


class CategoryController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request) {

        /**
         * We can also apply this to create categories. '...' is spread operator.
         Category::create([
            ...$request->validated(),
            'slug' => str($request->validated('name'))->slug()
        ]);
         */

        $validated = $request->validated();
        $validated['slug'] = str($request->validated('name'))->slug();
        $category = Category::create($validated);
        if ($category) {
            flash()->success('Category Added Successfully')->flash();
            return redirect()->route('admin.categories.index');
        }


        flash()->addError('Category not added successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category) {
        //
    }
}