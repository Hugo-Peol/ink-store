<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Repositories\AddressRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AddressController extends Controller
{
    protected AddressRepository $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function index(): View
    {
        $addresses = $this->addressRepository->findAll();
        return view('addresses.index', ['addresses' => $addresses]);
    }

    public function store(AddressRequest $request): RedirectResponse
    {
        $this->addressRepository->create($request->validated());
        return redirect()->route('addresses.index')->with('success', 'Endereço criado com sucesso.');
    }

    public function show(int $id): View
    {
        $address = $this->addressRepository->findOne($id);

        if (!$address) {
            abort(404, 'Endereço não encontrado');
        }

        return view('addresses.show', ['address' => $address]);
    }

    public function update(AddressRequest $request, int $id): RedirectResponse
    {
        $address = $this->addressRepository->edit($request->validated(), $id);

        if (!$address) {
            abort(404, 'Endereço não encontrado');
        }

        return redirect()->route('addresses.index')->with('success', 'Endereço atualizado com sucesso.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $deleted = $this->addressRepository->delete($id);

        if (!$deleted) {
            abort(404, 'Endereço não encontrado');
        }

        return redirect()->route('addresses.index')->with('success', 'Endereço excluído com sucesso.');
    }
}
