<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Review;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ReviewRepository implements BaseRepositoryInterface
{
    protected Review $model;

    public function __construct(Review $model)
    {
        $this->model = $model;
    }

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function create(Request $request): Model
    {
        return $this->model->create($request->only([
            'product_id',
            'user_id',
            'rating',
            'comment'
        ]));
    }

    public function findOne(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function edit(Request $request, int $id): ?Model
    {
        $review = $this->model->find($id);

        if ($review) {
            $review->update($request->only([
                'product_id',
                'user_id',
                'rating',
                'comment'
            ]));
        }

        return $review;
    }

    public function delete(int $id): bool
    {
        $review = $this->model->find($id);

        if ($review) {
            return $review->delete();
        }

        return false;
    }
}
