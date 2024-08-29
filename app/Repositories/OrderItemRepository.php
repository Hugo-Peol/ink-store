<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\OrderItem;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OrderItemRepository implements BaseRepositoryInterface
{
    protected OrderItem $model;

    public function __construct(OrderItem $model)
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
            'order_id',
            'product_id',
            'quantity',
            'price'
        ]));
    }

    public function findOne(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function edit(Request $request, int $id): ?Model
    {
        $orderItem = $this->model->find($id);

        if ($orderItem) {
            $orderItem->update($request->only([
                'order_id',
                'product_id',
                'quantity',
                'price'
            ]));
        }

        return $orderItem;
    }

    public function delete(int $id): bool
    {
        $orderItem = $this->model->find($id);

        if ($orderItem) {
            return $orderItem->delete();
        }

        return false;
    }
}
