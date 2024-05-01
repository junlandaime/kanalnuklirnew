<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Course;
use App\Models\Person;
use App\Models\Teacher;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $postsQuery = Post::query();

        if ($user->hasRole('teacher')) {
            $postsQuery->whereHas('author', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });
        }

        $posts = $postsQuery->count();
        $categories = Category::count();
        $courses = Course::count();
        $people = Person::count();
        $teachers = Teacher::count();
        $users = User::count();

        return view('admin.dashboard', compact('categories', 'courses', 'posts', 'teachers', 'users', 'people'));
    }
}
