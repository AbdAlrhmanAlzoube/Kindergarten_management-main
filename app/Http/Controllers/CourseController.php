<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(5);
        // dd($courses);
        return view('Admin.courses.index', compact('courses'));
    }
    
    public function create()
    {
        $teachers = Teacher::all();
        return view('Admin.courses.create', compact('teachers'));
    }

    public function store(CourseStoreRequest $request)
    {
        $validatedData = $request->validated();
        Course::create($validatedData);
        return redirect()->route('courses.index');
    }

    public function show(Course $course)
    {
        return view('Admin.courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $teachers = Teacher::all();
        return view('Admin.courses.edit', compact('course', 'teachers'));
    }
    
    public function update(CourseUpdateRequest $request, Course $course)
    {
        $validatedData = $request->validated();
        $course->update($validatedData);
        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index');
    }
}
