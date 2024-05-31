<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Forebear;
use App\Http\Requests\ForebearStoreRequest;
use App\Http\Requests\ForebearUpdateRequest;

class ForebearsController extends Controller
{
    public function index()
    {
        $forebears = Forebear::paginate(5);
        return view('Admin.forebears.index', compact('forebears'));
    }

    public function show(Forebear $forebear)
    {
        return view('Admin.forebears.show', compact('forebear'));
    }

    public function create()
    {
        return view('Admin.forebears.create');
    }

    public function store(ForebearStoreRequest $request)
    {
        $validatedData = $request->validated();
        
        // Upload image if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/users', 'public');
            $validatedData['image'] = $imagePath;
        }
    
        $user = User::create($validatedData);
        $forebear = Forebear::create([
            'user_id' => $user->id,
            'age' => $validatedData['age'],
        ]);
    
        $forebears = Forebear::paginate(5); // Use paginate instead of all
        return view('Admin.forebears.index', compact('forebears'))->with('success', 'Forebear created successfully');
    }
    
    public function edit(Forebear $forebear)
    {
        return view('Admin.forebears.edit', compact('forebear'));
    }

    public function update(ForebearUpdateRequest $request, Forebear $forebear)
    {
        $validatedData = $request->validated();

        $forebear->user->update($validatedData);

        // Update age and image if provided
        if ($request->has('age')) {
            $forebear->age = $request->age;
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/users', 'public');
            $forebear->user->image = $imagePath;
            $forebear->user->save();
        }

        $forebear->save();

        return redirect()->route('forebears.index')->with('success', 'Forebear updated successfully');
    }

    public function destroy(Forebear $forebear)
    {
        $forebear->delete();
        return redirect()->route('forebears.index')->with('success', 'Forebear deleted successfully');
    }
}
