<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photographer;

class PhotographerController extends Controller
{
    // Get all photographers
    public function index()
    {
        $photographers = Photographer::all();
        return response()->json($photographers);
    }

    // Create a new photographer
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'bio' => 'required',
            'profile_picture' => 'required'
        ]);
        // Try to create new photographer
        try {
            // Get new photographer data from request
            $newPhotographer = new Photographer([
                'name' => $request->get('name'),
                'phone' => $request->get('phone'),
                'email' => $request->get('email'),
                'bio' => $request->get('bio'),
                'profile_picture' => $request->get('profile_picture')
            ]);
            // Save new photographer
            $newPhotographer->save();
            // Return nrew photographer
            return response()->json($newPhotographer);
        // Error handling if create new photographer fails
        } catch(\Exception $error) {
            \Log::error($error->getMessage());
                return response()->json([
                    'message' => 'There was an error with creating your photographer.'
                ], 500);
        };
    }

    // Get photographer by id
    public function show($id)
    {
        $photographer = Photographer::findOrFail($id);
        return response()->json($photographer);
    }

    // Update specific photographer
    public function update(Request $request, $id)
    {
        // Validate request
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'bio' => 'required',
            'profile_picture' => 'required'
        ]);
        // Get photographer to update
        $photographer = Photographer::findOrFail($id);
        // Make updates with data from request
        $photographer->name = $request->get('name');
        $photographer->phone = $request->get('phone');
        $photographer->email = $request->get('email');
        $photographer->bio = $request->get('bio');
        $photographer->profile_picture = $request->get('profile_picture');
        // Save changes
        $photographer->save();
        // Return updated photographer
        return response()->json($photographer);
    }

    // Delete specific photographer
    public function destroy($id)
    {
        // Find photographer to be deleted
        $photographer = Photographer::findOrFail($id);
        // Delete photographer
        $photographer->delete();
        // Return updated list of photographers
        return response()->json($photographer::all());
    }
}
