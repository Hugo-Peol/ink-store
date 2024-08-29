<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    protected ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(): JsonResponse
    {
        $products = $this->productRepository->findAll();
        return response()->json($products);
    }

    public function store(Request $request): JsonResponse
    {
        $product = $this->productRepository->create($request);
        return response()->json($product, Response::HTTP_CREATED);
    }

    public function show(int $id): JsonResponse
    {
        $product = $this->productRepository->findOne($id);
        return response()->json($product);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $product = $this->productRepository->edit($request, $id);
        return response()->json($product);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->productRepository->delete($id);
        return response()->json(['deleted' => $deleted]);
    }
}
