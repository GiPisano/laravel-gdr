@extends('layouts.app')

@section('title', $title = "Character's detail")

@section('main-content')
    <section>
        <div class="container py-4">
            <h1>Scheda di {{ $character->name }}</h1>
            <a href="{{ route('characters.edit', $character) }}" class="btn btn-primary">Edit character</a>

            <h2>Description</h2>
            <p>{{ $character->description }}</p>

            <div class="row">
                <div class="col-3">
                    <h2>Life</h2>
                    <p>{{ $character->life }}</p>
                </div>
                <div class="col-3">
                    <h2>Attack</h2>
                    <p>{{ $character->attack }}</p>
                </div>
                <div class="col-3">
                    <h1>Defence</h1>
                    <p>{{ $character->defence }}</p>
                </div>
                <div class="col-3">
                    <h1>Speed</h1>
                    <p>{{ $character->speed }}</p>
                </div>
            </div>

        </div>

    </section>
@endsection
