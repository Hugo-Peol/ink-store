<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\ReviewRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ReviewController extends Controller
{
    protected ReviewRepository $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function index(): JsonResponse
    {
        $reviews = $this->reviewRepository->findAll();
        return response()->json($reviews);
    }

    public function store(Request $request): JsonResponse
    {
        $review = $this->reviewRepository->create($request);
        return response()->json($review, Response::HTTP_CREATED);
    }

    public function show(int $id): JsonResponse
    {
        $review = $this->reviewRepository->findOne($id);
        return response()->json($review);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $review = $this->reviewRepository->edit($request, $id);
        return response()->json($review);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->reviewRepository->delete($id);
        return response()->json(['deleted' => $deleted]);
    }
}
