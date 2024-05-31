<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherStoreRequest;
use App\Http\Requests\TeacherUpdateRequest;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $request=request();
        $teachers = Teacher::filterTeachers($request->only(['first_name','gender']))
        ->paginate(10);
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(TeacherStoreRequest $request)
    {
        $validatedData = $request->validated();
        
        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/teachers', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Create a new user
        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'gender' => $validatedData['gender'],
            'image' => $validatedData['image'] ?? null,
        ]);

        // Create a new teacher
        Teacher::create([
            'user_id' => $user->id,
            'experience_years' => $validatedData['experience_years'],
            'course_name' => $validatedData['course_name'],
            'age' => $validatedData['age'],
        ]);
        
        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully');
    }

    public function show(Teacher $teacher)
    {
        return view('admin.teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(TeacherUpdateRequest $request, Teacher $teacher)
    {
        $validatedData = $request->validated();
        
        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($teacher->user->image) {
                Storage::disk('public')->delete($teacher->user->image);
            }
            
            $imagePath = $request->file('image')->store('images/teachers', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Update the user
        $teacher->user->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $teacher->user->password,
            'gender' => $validatedData['gender'],
            'image' => $validatedData['image'] ?? $teacher->user->image,
        ]);

        // Update the teacher
        $teacher->update([
            'experience_years' => $validatedData['experience_years'],
            'course_name' => $validatedData['course_name'],
            'age' => $validatedData['age'],
        ]);
        
        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully');
    }

    public function destroy(Teacher $teacher)
    {
        // Delete the user image if it exists
        if ($teacher->user->image) {
            Storage::disk('public')->delete($teacher->user->image);
        }

        // Delete the user and the teacher
        $teacher->user->delete();
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully');
    }
}
