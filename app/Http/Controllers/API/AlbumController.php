<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;


class AlbumController extends Controller
{
    // Get all albums
    public function index()
    {
        $albums = Album::all();
        return response()->json($albums);
    }

    // Create a new album
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'album_name' => 'required',
            'photographer_id' => 'required'
        ]);
        // Create new album with request data
        $newAlbum = new Album([
            'album_name' => $request->get('album_name'),
            'photographer_id' => $request->get('photographer_id')
        ]);
        // Save new album
        $newAlbum->save();
        // Return new album
        return response()->json($newAlbum);
    }

    // Get specific album by id
    public function show($id)
    {
        $album = Album::findOrFail($id);
        return response()->json($album);
    }

    // Update specific album
    public function update(Request $request, $id)
    {
        // Validate request
        $request->validate([
            'album_name' => 'required',
            'photographer_id' => 'required',
        ]);
        // Find album to be updated
        $album = Album::findOrFail($id);
        // Update the album
        $album->album_name = $request->get('album_name');
        $album->photographer_id = $request->get('photographer_id');
        // Save updated album
        $album->save();
        // Return updated album
        return response()->json($album);

    }

    // Delete album by id
    public function destroy($id)
    {
        // Find album to be delete
        $album = Album::findOrFail($id);
        // Delete album
        $album->delete();
        // Return updated list of albums
        return response()->json($album::all());
    }
}
