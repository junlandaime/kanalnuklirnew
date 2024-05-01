<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Person;
use App\Models\Category;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $posts = Post::query();

        $posts->whereHas('category', function ($posts) {
            $posts->where('parent_id', '!=', 3);
        });
        $posts = $posts->where('status', 1)->orderBy('id', 'desc')->paginate(10);
        $categoriesBlog = Category::where('id', 3)->orderBy('id', 'desc')->paginate(8);

        return view('front.index', compact('posts', 'categoriesBlog'));
    }

    public function people()
    {
        $people = Person::where('status', 1)->orderBy('name', 'asc')->get();
        $subjects = Subject::orderBy('id', 'desc')->get();

        return view('front.people', compact('people', 'subjects'));
    }

    public function people_details(Person $person)
    {
        $people = Person::where('status', 1)->orderBy('name', 'desc')->paginate(8);
        return view('front.details', compact('person', 'people'));
    }

    public function news()
    {

        $posts = Post::query();

        $posts->whereHas('category', function ($posts) {
            $posts->where('parent_id', '!=', 3);
        });

        $categories = Category::with(['child'])->withCount(['child'])->getParent()->orderBy('name', 'ASC')->get();

        // $categories = Category::with(['child'])->where('parent_id', '!=', 3)->get();
        $posts = $posts->where('status', 1)->orderBy('id', 'desc')->paginate(10);

        return view('front.news', compact('posts', 'categories'));
    }

    public function news_details(Post $post)
    {
        $categories = Category::where('parent_id', '!=', 3)->get();
        return view('front.news_detail', compact('post', 'categories'));
    }

    public function blog()
    {

        // $posts = Post::orderBy('id', 'desc')->paginate(8);
        $posts = Post::query();

        $posts->whereHas('category', function ($posts) {
            $posts->where('parent_id', 3);
        });
        $categories = Category::with(['child'])->withCount(['child'])->getParent()->orderBy('name', 'ASC')->get();

        $posts = $posts->where('status', 1)->orderBy('id', 'desc')->paginate(10);

        return view('front.posts', compact('posts', 'categories'));
    }

    public function blog_details(Post $post)
    {
        $categories = Category::with(['child'])->get();
        return view('front.post', compact('post', 'categories'));
    }

    public function category(Category $category)
    {
        $posts = Post::query();
        $categories = Category::with(['child'])->withCount(['child'])->getParent()->orderBy('name', 'ASC')->get();

        if ($category->parent_id == 3) {
            $posts->whereHas('category', function ($posts) use ($category) {
                $posts->where('category_id', $category->id);
            });
            // $categories = Category::with(['child'])->where('parent_id', '!=', 3)->get();
            $posts = $posts->where('status', 1)->orderBy('id', 'desc')->paginate(10);

            return view('front.posts', compact('posts', 'categories', 'category'));
        } elseif ($category->parent_id != 3) {
            $posts->whereHas('category', function ($posts) use ($category) {
                $posts->where('category_id', $category->id);
            });
            // $categories = Category::with(['child'])->where('parent_id', '!=', 3)->get();
            $posts = $posts->where('status', 1)->orderBy('id', 'desc')->paginate(10);

            return view('front.news', compact('posts', 'categories', 'category'));
        }
    }

    public function course()
    {
        $courses = Course::orderBy('code', 'desc')->get();
        return view('front.courses', compact('courses'));
    }

    public function about()
    {

        return view('front.about');
    }
    public function lecturer()
    {

        return view('front.about_lecturer');
    }
    public function roadmap()
    {

        return view('front.about_roadmap');
    }
}
