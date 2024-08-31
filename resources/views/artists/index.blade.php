@extends('layouts.app')

@section('content')
    <h1>Artistas</h1>

    <a href="{{ route('artists.create') }}" class="btn btn-primary">Criar Novo Artista</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul>
        @foreach($artists as $artist)
            <li>
                <a href="{{ route('artists.show', $artist->id) }}">{{ $artist->name }}</a>
                <a href="{{ route('artists.edit', $artist->id) }}" class="btn btn-secondary">Editar</a>

                <form action="{{ route('artists.destroy', $artist->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
