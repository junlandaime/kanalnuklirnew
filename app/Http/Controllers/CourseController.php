<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCourseRequest;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $courses = Course::orderBy('id', 'desc')->get();


        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        // dd($request);
        //
        DB::transaction(function () use ($request) {

            $validated = $request->validated();

            $validated['slug'] = Str::slug($validated['name']);

            Course::create($validated);
        });
        return redirect()->route('admin.courses.index')->with(['success' => 'Mata Kuliah Baru Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCourseRequest $request, Course $course)
    {
        DB::transaction(function () use ($request, $course) {

            $validated = $request->validated();

            $validated['slug'] = Str::slug($validated['name']);

            $course->update($validated);
        });
        return redirect()->route('admin.courses.index')->with(['success' => 'Mata Kuliah Baru Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        DB::beginTransaction();

        try {
            $course->delete();
            DB::commit();

            return redirect()->route('admin.courses.index')->with(['success' => 'Postingan Berhasil Dihapus']);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.courses.index')->with('error', 'terjadinya sebuah error');
        }
    }
}
