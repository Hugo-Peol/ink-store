<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\ArtRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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

    public function store(Request $request): JsonResponse
    {
        $art = $this->artRepository->create($request);
        return response()->json($art, 201);
    }

    public function show(int $id): JsonResponse
    {
        $art = $this->artRepository->findOne($id);

        if (!$art) {
            return response()->json(['message' => 'Art not found'], 404);
        }

        return response()->json($art);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $art = $this->artRepository->edit($request, $id);

        if (!$art) {
            return response()->json(['message' => 'Art not found'], 404);
        }

        return response()->json($art);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->artRepository->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Art not found'], 404);
        }

        return response()->json(['message' => 'Art deleted successfully']);
    }
}
