<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ArtRequest;
use App\Repositories\ArtRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ArtController extends Controller
{
    protected ArtRepository $artRepository;

    public function __construct(ArtRepository $artRepository)
    {
        $this->artRepository = $artRepository;
    }

    public function index(): View
    {
        $arts = $this->artRepository->findAll();
        return view('arts.index', ['arts' => $arts]);
    }

    public function store(ArtRequest $request): RedirectResponse
    {
        $this->artRepository->create($request->validated());
        return redirect()->route('arts.index')->with('success', 'Arte criada com sucesso.');
    }

    public function show(int $id): View
    {
        $art = $this->artRepository->findOne($id);

        if (!$art) {
            abort(404, 'Arte não encontrada');
        }

        return view('arts.show', ['art' => $art]);
    }

    public function update(ArtRequest $request, int $id): RedirectResponse
    {
        $art = $this->artRepository->edit($request->validated(), $id);

        if (!$art) {
            abort(404, 'Arte não encontrada');
        }

        return redirect()->route('arts.index')->with('success', 'Arte atualizada com sucesso.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $deleted = $this->artRepository->delete($id);

        if (!$deleted) {
            abort(404, 'Arte não encontrada');
        }

        return redirect()->route('arts.index')->with('success', 'Arte excluída com sucesso.');
    }
}
