<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\AddressRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AddressController extends Controller
{
    protected AddressRepository $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function index(): JsonResponse
    {
        $addresses = $this->addressRepository->findAll();
        return response()->json($addresses);
    }

    public function store(Request $request): JsonResponse
    {
        $address = $this->addressRepository->create($request);
        return response()->json($address, Response::HTTP_CREATED);
    }

    public function show(int $id): JsonResponse
    {
        $address = $this->addressRepository->findOne($id);
        return response()->json($address);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $address = $this->addressRepository->edit($request, $id);
        return response()->json($address);
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->addressRepository->delete($id);
        return response()->json(['deleted' => $deleted]);
    }
}
