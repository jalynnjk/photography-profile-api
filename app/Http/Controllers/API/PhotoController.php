<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Http\Resources\PhotoResource;
use Storage;

class PhotoController extends Controller
{
    // Get all photos
    public function index()
    {
        $photos = Photo::all();
        return response()->json($photos);
    }

    // Create new photo
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'album_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'img' => 'required',
            'date' => 'required'
        ]);
        // Handle aws file upload
        $file = $request->file('img');
        $name=time().$file->getClientOriginalName();
        $filePath = 'images/' . $name;
        Storage::disk('s3')->put($filePath, file_get_contents($file));
        // Create new photo
        $newPhoto = new Photo([
            'album_id' => $request->get('album_id'),
            'img' => $filePath,
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'date' => $request->get('date')
        ]);
        // Save new photo
        $newPhoto->save();
        // Return new album
        return response()->json(new PhotoResource($newPhoto));
    }

    // Get specific photo by id
    public function show($id)
    {
        $photo = Photo::findOrFail($id);
        return response()->json($photo);
    }

    // Update specific photo
    public function update(Request $request, $id)
    {
        // Validate request
        $request->validate([
            'album_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'img' => 'required',
            'date' => 'required'
        ]);
        // Get photo to be updated
        $photo = Photo::findOrFail($id);
        // Update the photo
        $photo->album_id = $request->get('album_id');
        $photo->title = $request->get('title');
        $photo->description = $request->get('description');
        $photo->img = $request->get('img');
        $photo->date = $request->get('date');
        $photo->featured = $request->get('featured');
        // Save updated photo
        $photo->save();
        // Return updated photo
        return response()->json($photo);
    }

    // Delete photo by id
    public function destroy($id)
    {
        // Find photo to be deleted
        $photo = Photo::findOrFail($id);
        // Delete photo file from aws
        Storage::disk('s3')->delete($photo->img);
        // Delete photo from database
        $photo->delete();
        // Return updated list of albums
        return response()->json($photo::all());
    }
}
