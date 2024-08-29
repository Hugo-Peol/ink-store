<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $artists = Artist::all();
        return response()->json($artists);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return a view or JSON for the form if needed
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string',
        ]);

        $artist = Artist::create($validated);
        return response()->json($artist, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $artist = Artist::findOrFail($id);
        return response()->json($artist);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        // Return a view or JSON for the edit form if needed
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $artist = Artist::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string',
        ]);

        $artist->update($validated);
        return response()->json($artist);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $artist = Artist::findOrFail($id);
        $artist->delete();
        return response()->json(null, 204);
    }
}
