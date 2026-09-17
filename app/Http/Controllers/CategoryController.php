<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with(['child'])->withCount(['child'])->getParent()->orderBy('name', 'ASC')->get();
        $parent = Category::getParent()->orderBy('name', 'ASC')->get();

        return view('admin.categories.index', compact('categories', 'parent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::with(['parent'])->orderByDesc('id')->get();
        $parent = Category::getParent()->orderBy('name', 'ASC')->get();

        return view('admin.categories.create', compact('categories', 'parent'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $validated['slug'] = Str::slug($validated['name']);

            Category::create($validated);
        });

        return redirect()->route('admin.categories.index')->with(['success' => 'Kategori Baru Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $parent = Category::getParent()->orderBy('name', 'ASC')->get();

        return view('admin.categories.edit', compact('category', 'parent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        DB::transaction(function () use ($request, $category) {
            $validated = $request->validated();

            $validated['slug'] = Str::slug($validated['name']);

            $category->update($validated);
        });

        return redirect()->route('admin.categories.index')->with(['success' => 'Kategori Berhasil Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::withCount(['child', 'posts'])->find($id);

        if ($category->child_count == 0 && $category->posts_count == 0) {
            $category->delete();

            return redirect(route('admin.categories.index'))->with(['success' => 'Kategori Dihapus!']);
        }

        return redirect(route('admin.categories.index'))->with(['error' => 'Kategori Ini Memiliki Anak Kategori atau Postingan yang meliki Kategori ini!']);
    }
}
