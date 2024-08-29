<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Address;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AddressRepository implements BaseRepositoryInterface
{
    protected Address $model;

    public function __construct(Address $model)
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
            'user_id',
            'address_line1',
            'address_line2',
            'city',
            'state',
            'postal_code',
            'country'
        ]));
    }

    public function findOne(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function edit(Request $request, int $id): ?Model
    {
        $address = $this->model->find($id);

        if ($address) {
            $address->update($request->only([
                'user_id',
                'address_line1',
                'address_line2',
                'city',
                'state',
                'postal_code',
                'country'
            ]));
        }

        return $address;
    }

    public function delete(int $id): bool
    {
        $address = $this->model->find($id);

        if ($address) {
            return $address->delete();
        }

        return false;
    }
}
