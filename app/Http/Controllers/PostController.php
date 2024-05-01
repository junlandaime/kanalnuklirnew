<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $posts = Post::query();
        $postsQ = Post::orderBy('id', 'desc')->get();

        if ($user->hasRole('teacher')) {
            $posts->whereHas('author', function ($posts) use ($user) {
                $posts->where('user_id', $user->id);
            });
        }

        $posts = $posts->orderBy('id', 'desc')->paginate(10);


        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        // $categories = Category::query();
        $categories = Category::with(['child'])->withCount(['child'])->getParent()->orderBy('name', 'ASC')->get();
        $parent = Category::getParent()->orderBy('name', 'ASC')->get();


        return view('admin.posts.create', compact('categories', 'parent'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
        DB::transaction(function () use ($request) {

            $validated = $request->validated();

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $validated['image'] = $imagePath;
            } else {
                $imagePath = 'images/image-default.png';
            }

            $validated['slug'] = Str::slug($validated['title']);
            // $validated['published_at'] = Carbon::now();
            $validated['user_id'] = Auth::user()->id;

            Post::create($validated);
        });

        return redirect()->route('admin.posts.index')->with(['success' => 'Postingan Baru Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function toggle(Post $post)
    {
        //
        if ($post->status) {
            $post->update([
                'status' => 0
            ]);
            return redirect()->route('admin.posts.index')->with(['error' => 'Postingan Baru DiDraftkan!']);
        }

        if (!$post->status) {
            $post->update([
                'status' => 1
            ]);
            return redirect()->route('admin.posts.index')->with(['success' => 'Postingan Baru Dipublish!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::with(['child'])->withCount(['child'])->getParent()->orderBy('name', 'ASC')->get();
        $parent = Category::getParent()->orderBy('name', 'ASC')->get();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // dd($post);
        //
        DB::transaction(function () use ($request, $post) {

            $validated = $request->validated();

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $validated['image'] = $imagePath;
            }

            $validated['slug'] = Str::slug($validated['title']);

            $post->update($validated);
        });

        return redirect()->route('admin.posts.index')->with(['success' => 'Postingan Berhasil Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        DB::beginTransaction();

        try {
            $post->delete();
            DB::commit();

            return redirect()->route('admin.posts.index')->with(['success' => 'Postingan Berhasil Dihapus']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.posts.index')->with('error', 'terjadinya sebuah error');
        }
    }
}
