<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductRepository implements BaseRepositoryInterface
{
    protected Product $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function create(Request $request): Model
    {
        $data = $request->only(['category_id', 'name', 'description', 'price', 'stock', 'image_url']);
        return $this->model->create($data);
    }

    public function findOne(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function edit(Request $request, int $id): ?Model
    {
        $product = $this->model->find($id);

        if ($product) {
            $data = $request->only(['category_id', 'name', 'description', 'price', 'stock', 'image_url']);
            $product->update($data);
        }

        return $product;
    }

    public function delete(int $id): bool
    {
        $product = $this->model->find($id);

        if ($product) {
            return $product->delete();
        }

        return false;
    }
}
