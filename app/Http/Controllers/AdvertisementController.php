<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AdvertisementStoreRequest;

class AdvertisementController extends Controller
{
    public function index()
    {

        $request=request();
        $advertisements = Advertisement::filterAdvertisements($request->only('status'))
        ->paginate(10);
        return view('Admin.advertisements.index', compact('advertisements'));
    }

    public function create()
    {
        return view('Admin.advertisements.create');
    }

    public function store(AdvertisementStoreRequest $request)
    {
        $validatedData = $request->validated();
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/advertisements');
            $validatedData['image'] = str_replace('public/', '', $imagePath);
        }
    
        Advertisement::create($validatedData);
    
        return redirect()->route('advertisements.index')
            ->with('success', 'Advertisement created successfully.');
    }
    

    public function show(Advertisement $advertisement)
    {
        return view('Admin.advertisements.show', compact('advertisement'));
    }

    public function edit(Advertisement $advertisement)
    {
        return view('Admin.advertisements.edit', compact('advertisement'));
    }

    public function update(Request $request, Advertisement $advertisement)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::delete('public/' . $advertisement->image);

            // Store new image
            $imagePath = $request->file('image')->store('public/advertisements');
            $validatedData['image'] = str_replace('public/', '', $imagePath);
        }

        $advertisement->update($validatedData);

        return redirect()->route('advertisements.index')
            ->with('success', 'Advertisement updated successfully.');
    }

    public function destroy(Advertisement $advertisement)
    {
        // Delete advertisement image
        Storage::delete('public/' . $advertisement->image);

        $advertisement->delete();
        return redirect()->route('advertisements.index')
            ->with('success', 'Advertisement deleted successfully.');
    }
}
