<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OrderRepository implements BaseRepositoryInterface
{
    protected Order $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function create(Request $request): Model
    {
        $data = $request->only(['user_id', 'total_amount', 'status']);
        return $this->model->create($data);
    }

    public function findOne(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function edit(Request $request, int $id): ?Model
    {
        $order = $this->model->find($id);

        if ($order) {
            $data = $request->only(['user_id', 'total_amount', 'status']);
            $order->update($data);
        }

        return $order;
    }

    public function delete(int $id): bool
    {
        $order = $this->model->find($id);

        if ($order) {
            return $order->delete();
        }

        return false;
    }
}
