<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\ArtRepository;
use App\Repositories\Contracts\ArtRepositoryInterface;
use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\View\View;

class HomeController extends Controller
{
    private ArtRepository $artRepository;

    public function __construct(ArtRepository $artRepository)
    {
        $this->artRepository = $artRepository;
    }

    public function index(): View
    {
        $arts = $this->artRepository->findAll();

        return view('home', ['arts' => $arts]);
    }
}
