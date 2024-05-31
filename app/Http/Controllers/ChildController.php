<?php


namespace App\Http\Controllers;

use App\Http\Requests\ChildStoreRequest;
use App\Models\Child;
use App\Models\User;
use App\Models\Forebear;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    public function index()
    {

        $request=request();
        $children = Child::filterChildren($request->only(['first_name','education_stage']))
        ->paginate(10);
        return view('Admin.children.index', compact('children'));
    }

    public function show(User $user, Child $child)
    {
        return view('Admin.children.show', compact('user', 'child'));
    }

    public function create()
    {
        $forebears = Forebear::all();
        return view('Admin.children.create', compact('forebears'));
    }

    public function store(ChildStoreRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/users', 'public');
            $validatedData['image'] = $imagePath;
        }

        $user = User::create($validatedData);
        $child = Child::create([
            'user_id' => $user->id,
            'forebear_id' => $validatedData['forebear_id'],
            'age' => $validatedData['age'],
            'education_stage' => $validatedData['education_stage'],
        ]);

        $children = Child::paginate(10);
        return view('Admin.children.index', compact('children'));
    }

    public function edit(Child $child)
    {
        $forebears = Forebear::all();
        return view('Admin.children.edit', compact('child', 'forebears'));
    }
    public function update(ChildStoreRequest $request, Child $child)
    {
        $validatedData = $request->validated();
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/users', 'public');
            $validatedData['image'] = $imagePath;
        } else {
            $validatedData['image'] = $child->user->image;
        }
    
        $child->user->update($validatedData);
    
        if ($validatedData['password']) {
            $child->user->update(['password' => bcrypt($validatedData['password'])]);
        }
    
        $child->update([
            'forebear_id' => $validatedData['forebear_id'],
            'age' => $validatedData['age'],
            'education_stage' => $validatedData['education_stage'],
        ]);
    
        return redirect()->route('children.index')->with('success', 'Child updated successfully');
    }
    

    public function destroy(Child $child)
    {
        $child->delete();
        return redirect()->route('children.index')->with('success', 'Child deleted successfully');
    }
}
