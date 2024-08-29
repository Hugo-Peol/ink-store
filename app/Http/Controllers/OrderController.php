<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    protected OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index(): JsonResponse
    {
        $orders = $this->orderRepository->findAll();
        return response()->json($orders);
    }

    public function store(Request $request): JsonResponse
    {
        $order = $this->orderRepository->create($request);
        return response()->json($order, Response::HTTP_CREATED);
    }

    public function show(int $id): JsonResponse
    {
        $order = $this->orderRepository->findOne($id);
        return response()->json($order);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $order = $this->orderRepository->edit($request, $id);
        return response()->json($order);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->orderRepository->delete($id);
        return response()->json(['deleted' => $deleted]);
    }
}
