<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Art;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ArtRepository implements BaseRepositoryInterface
{
    protected Art $model;

    public function __construct(Art $model)
    {
        $this->model = $model;
    }

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function create(Request $request): Model
    {
        $data = $request->only(['title', 'description', 'image_path']);
        return $this->model->create($data);
    }

    public function findOne(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function edit(Request $request, int $id): ?Model
    {
        $art = $this->model->find($id);

        if ($art) {
            $data = $request->only(['title', 'description', 'image_path']);
            $art->update($data);
        }

        return $art;
    }

    public function delete(int $id): bool
    {
        $art = $this->model->find($id);

        if ($art) {
            return $art->delete();
        }

        return false;
    }
}
