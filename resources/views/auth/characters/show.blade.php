@extends('layouts.app')

@section('title', $title = "Character's detail")

@section('content')
    <section>
        <div class="container py-4">
            <h1>Scheda di {{ $character->name }}</h1>
            <a href="{{ route('characters.edit', $character) }}" class="btn btn-primary">Edit character</a>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
                Launch demo modal
            </button>

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

                <div class="col-3">
                    <h1>Items</h1>
                    <p>
                        @foreach ($character->items as $item)
                            @if (!$loop->last)
                                {{ $item->name }} -
                            @else
                                {{ $item->name }}
                            @endif
                        @endforeach
                    </p>
                </div>

                <div class="col-3">
                    <h1>Type</h1>
                    <p>{{ $character->type->name }}</p>
                </div>
            </div>

        </div>

    </section>
@endsection

@section('modal')
    <div class="modal" tabindex="-1" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Attenzione</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>sei sicuro di voler cancellare questo personaggio, non si può più tornare indietro</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('characters.destroy', $character) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">
                            Delete character
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
