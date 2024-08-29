<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository implements BaseRepositoryInterface
{
    protected Category $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function create(Request $request): Model
    {
        $data = $request->only(['name', 'description']);
        return $this->model->create($data);
    }

    public function findOne(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function edit(Request $request, int $id): ?Model
    {
        $category = $this->model->find($id);

        if ($category) {
            $data = $request->only(['name', 'description']);
            $category->update($data);
        }

        return $category;
    }

    public function delete(int $id): bool
    {
        $category = $this->model->find($id);

        if ($category) {
            return $category->delete();
        }

        return false;
    }
}
