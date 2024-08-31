<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ArtistRequest;
use App\Models\Artist;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $artists = Artist::all();
        return view('artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArtistRequest $request): RedirectResponse
    {
        $artist = Artist::create($request->validated());
        return redirect()->route('artists.index')->with('success', 'Artista criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): View
    {
        $artist = Artist::findOrFail($id);
        return view('artists.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View
    {
        $artist = Artist::findOrFail($id);
        return view('artists.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArtistRequest $request, int $id): RedirectResponse
    {
        $artist = Artist::findOrFail($id);
        $artist->update($request->validated());
        return redirect()->route('artists.index')->with('success', 'Artista atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        $artist = Artist::findOrFail($id);
        $artist->delete();
        return redirect()->route('artists.index')->with('success', 'Artista excluído com sucesso.');
    }
}
