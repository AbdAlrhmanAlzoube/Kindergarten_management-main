<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Child;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
   
    public function index()
    {
        $request=request();
        $users = User::filter($request->only(['first_name','type']))
        ->orderBy('first_name','DESC')->paginate(5); //LATEST
        return view('Admin.users.index', compact('users')); 
        
    }

    
    public function create()
    {
        return view('Admin.users.create');
    }

 
    public function store(UserStoreRequest $request)
    {
        $validatedData = $request->validated();
   
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/users', 'public');
            $validatedData['image'] = $imagePath;
        }
    
        // Create the user
        $user = User::create($validatedData);
    
       
   
        return redirect()->route('users.index', $user->id)->with('success', 'User created successfully');
    }
    

    public function show(User $user)
    {
        // $child=Child::all();
        return view('Admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('Admin.users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        // Retrieve validated data from the request
        $validatedData = $request->validated();
    
        // Adjust the email validation rule to ignore the current user's ID
        $validatedData['email'] = $request->validate([
            'email' => 'email|max:255|unique:users,email,' . $user->id,
        ])['email'];
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/users', 'public');
            $validatedData['image'] = $imagePath;
        }
    
        // Update user data
        $user->update($validatedData);
    
        // Redirect to users index with success message
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
    


   
    public function destroy(User $user)
    {
        
    
        
        $user->delete();
    
        // Redirect to the index page with success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
    
}
