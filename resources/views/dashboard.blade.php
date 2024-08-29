<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Header Section -->
        <header class="text-center my-4">
            <h1 class="display-4 text-warning">Welcome to TattooArt</h1>
            <p class="lead text-light">Discover unique tattoo designs and choose your artist.</p>
            <a href="{{ route('products.index') }}" class="btn btn-warning btn-lg">Explore Tattoos</a>
        </header>

        <!-- Featured Artists Section -->
        <section class="my-5">
            <h2 class="text-light">Featured Artists</h2>
            <div class="row">
                @foreach($artists as $artist)
                    <div class="col-md-4 mb-4">
                        <div class="card bg-dark text-light">
                            <img src="{{ $artist->image_url }}" class="card-img-top" alt="{{ $artist->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $artist->name }}</h5>
                                <p class="card-text">{{ $artist->description }}</p>
                                <a href="{{ route('products.index', ['artist' => $artist->id]) }}" class="btn btn-warning">View Tattoos</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Latest Reviews Section -->
        <section class="my-5">
            <h2 class="text-light">Latest Reviews</h2>
            <div class="row">
                @foreach($reviews as $review)
                    <div class="col-md-4 mb-4">
                        <div class="card bg-dark text-light">
                            <div class="card-body">
                                <h5 class="card-title">Rating: {{ $review->rating }} ★</h5>
                                <p class="card-text">{{ $review->comment }}</p>
                                <p class="card-text"><small>By {{ $review->user->name }}</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
