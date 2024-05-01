<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Models\Person;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
// Route::get('/details', [FrontController::class, 'details'])->name('front.detail');

Route::get('/people', [FrontController::class, 'people'])->name('front.people');
Route::get('/people/{person:slug}', [FrontController::class, 'people_details'])->name('front.people_details');

Route::get('/course', [FrontController::class, 'course'])->name('front.course');
Route::get('/course/{course:slug}', [FrontController::class, 'course_details'])->name('front.course_details');

Route::get('/category/{category:slug}', [FrontController::class, 'category'])->name('front.category');

Route::get('/news', [FrontController::class, 'news'])->name('front.news');
Route::get('/news/{post:slug}', [FrontController::class, 'news_details'])->name('front.news_details');

Route::get('/blog', [FrontController::class, 'blog'])->name('front.blog');
Route::get('/blog/{post:slug}', [FrontController::class, 'blog_details'])->name('front.blog_details');

Route::get('/about', [FrontController::class, 'about'])->name('front.about');
Route::get('/about/lecturer', [FrontController::class, 'lecturer'])->name('front.about_lecturer');
Route::get('/about/roadmap', [FrontController::class, 'roadmap'])->name('front.about_roadmap');

Route::get('/verify', [TeacherController::class, 'verify'])->name('teacher.verify');
Route::post('/verify', [TeacherController::class, 'verifyCheck'])->name('teacher.verify_check');
Route::get('verify/{token}', [TeacherController::class, 'verifyDosen'])->name('teacher.verify_dosen');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('administrator')->name('admin.')->group(function () {
        Route::resource('categories', CategoryController::class)
            ->middleware('role:admin');

        Route::resource('people', PersonController::class)
            ->middleware('role:admin');

        Route::resource('teachers', TeacherController::class)
            ->middleware('role:admin');

        Route::resource('posts', PostController::class)
            ->middleware('role:admin|teacher');

        Route::resource('courses', CourseController::class)
            ->middleware('role:admin');

        Route::get('/posts/{post}', [PostController::class, 'toggle'])->name('posts.toggle');
        Route::get('/people/{person}', [PersonController::class, 'toggle'])->name('people.toggle');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

require __DIR__ . '/auth.php';
