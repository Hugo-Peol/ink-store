<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    protected CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(): JsonResponse
    {
        $categories = $this->categoryRepository->findAll();
        return response()->json($categories);
    }

    public function store(Request $request): JsonResponse
    {
        $category = $this->categoryRepository->create($request);
        return response()->json($category, Response::HTTP_CREATED);
    }

    public function show(int $id): JsonResponse
    {
        $category = $this->categoryRepository->findOne($id);
        return response()->json($category);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $category = $this->categoryRepository->edit($request, $id);
        return response()->json($category);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->categoryRepository->delete($id);
        return response()->json(['deleted' => $deleted]);
    }
}
