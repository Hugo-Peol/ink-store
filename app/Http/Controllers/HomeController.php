<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): \Illuminate\View\View
    {
        $artists = Artist::all(); // Certifique-se de ter um modelo Artist e dados para esta consulta
        $reviews = Review::latest()->take(3)->get(); // Ajuste conforme a lógica dos reviews

        return view('home', compact('artists', 'reviews'));
    }
}
