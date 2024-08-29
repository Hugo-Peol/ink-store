<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\OrderItemRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class OrderItemController extends Controller
{
    protected OrderItemRepository $orderItemRepository;

    public function __construct(OrderItemRepository $orderItemRepository)
    {
        $this->orderItemRepository = $orderItemRepository;
    }

    public function index(): JsonResponse
    {
        $orderItems = $this->orderItemRepository->findAll();
        return response()->json($orderItems);
    }

    public function store(Request $request): JsonResponse
    {
        $orderItem = $this->orderItemRepository->create($request);
        return response()->json($orderItem, Response::HTTP_CREATED);
    }

    public function show(int $id): JsonResponse
    {
        $orderItem = $this->orderItemRepository->findOne($id);
        return response()->json($orderItem);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $orderItem = $this->orderItemRepository->edit($request, $id);
        return response()->json($orderItem);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->orderItemRepository->delete($id);
        return response()->json(['deleted' => $deleted]);
    }
}
