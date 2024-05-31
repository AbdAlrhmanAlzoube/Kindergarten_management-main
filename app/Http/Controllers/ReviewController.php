<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Child;
use App\Models\Teacher;
use App\Models\Course;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $request=request();
        $reviews = Review::filterReviews($request->only(['first_name','level']))
        ->paginate(10);
        return view('Admin.reviews.index', compact('reviews'));
    }

    public function create()
    {
        $children = Child::all();
        $teachers = Teacher::all();
        $courses = Course::all();
        return view('Admin.reviews.create', compact('children', 'teachers', 'courses'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'child_id' => 'required|exists:children,id',
            'teacher_id' => 'required|exists:teachers,id',
            'course_id' => 'required|exists:courses,id',
            'level' => 'required',
        ]);

        // Include 'child_id' when creating a new review
        $reviewData = array_merge($validatedData, ['child_id' => $request->input('child_id')]);

        Review::create($reviewData);

        return redirect()->route('reviews.index')->with('success', 'Review added successfully.');
    }

    public function show(Review $review)
    {
        return view('Admin.reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        $children = Child::all();
        $teachers = Teacher::all();
        $courses = Course::all();
        return view('Admin.reviews.edit', compact('review', 'children', 'teachers', 'courses'));
    }

    public function update(Request $request, Review $review)
    {
        $validatedData = $request->validate([
            'child_id' => 'required|exists:children,id',
            'teacher_id' => 'required|exists:teachers,id',
            'course_id' => 'required|exists:courses,id',
            'level' => 'required',
        ]);

        $review->update($validatedData);

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully.');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully.');
    }
}
