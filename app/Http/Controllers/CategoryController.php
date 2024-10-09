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
        $categories = Category::latest()->paginate(10);

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
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category) {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category) {

        $validated = $request->validated();
        if ($validated['name'] !== $category['name']) {
            $validated['slug'] = str($request->validated('name'))->slug();
        }
        $category->updateOrFail($validated);

        flash()->success('Category Updated Successfully')->flash();
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category) {

        $category->deleteOrFail();

        flash()->success('"' . $category->name . '"' . '  ' . 'Deleted Successfully')->flash();
        return redirect()->route('admin.categories.index');
    }
}
