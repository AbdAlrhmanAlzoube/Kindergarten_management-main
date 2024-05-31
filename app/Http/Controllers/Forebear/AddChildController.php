<?php

namespace App\Http\Controllers\Forebear;

use App\Models\Forebear;
use App\Models\Child;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class AddChildController extends Controller
{
    public function index()
    {
        $request=request();
        $children = Child::filterChildren($request->only(['first_name','education_stage']))
        ->with(['user', 'forebear.user'])->paginate(6);
        return view('Dashboard.Forebear.pages.index', compact('children'));
    }

    public function show($id)
    {
        $child = Child::with(['user', 'forebear.user'])->findOrFail($id);
        return view('Dashboard.Forebear.pages.show', compact('child'));
    }
    
    public function create()
    {
        $forebears = Forebear::with('user')->get();
        $users = User::all();
        return view('Dashboard.Forebear.pages.create', compact('forebears', 'users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'forebear_id' => 'required|exists:forebears,id',
            'age' => 'required|integer|min:0',
            'education_stage' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/users', 'public');
            $validatedData['image'] = $imagePath;
        }

        $child = Child::create($validatedData);

        return redirect()->route('forebear_child.show', ['forebear_child' => $child->id])
                         ->with('success', 'Child created successfully.');
    }

    public function edit($id)
    {
        $users = User::all();
        $forebears = Forebear::all();
        $child = Child::findOrFail($id);
        return view('Dashboard.Forebear.pages.edit', compact('child', 'users', 'forebears'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'exists:users,id',
            'forebear_id' => 'exists:forebears,id', 
            'age' => 'required|integer|min:0', 
            'education_stage' => 'required|string|max:255', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $child = Child::findOrFail($id);  
        
       
        if ($request->hasFile('image')) {
            if ($child->user->image) {
                Storage::disk('public')->delete($child->user->image);
            }
            $imagePath = $request->file('image')->store('images/users', 'public');
            $validatedData['image'] = $imagePath;
        }

        $child->update($validatedData);

        return redirect()->route('forebear_child.show', ['forebear_child' => $child->id])
                         ->with('success', 'Child updated successfully.');
    }

    public function destroy($id)
    {
        $child = Child::findOrFail($id);

        if ($child->user->image) {
            Storage::disk('public')->delete($child->user->image);
        }

        $child->delete();

        return redirect()->route('forebear_child.index')
                         ->with('success', 'Child deleted successfully.');
    }
}

