@extends('layouts.app')

@section('title', 'Characters')

@section('content')
    <section>
        <div class="container py-4">
            <h1>Characters list</h1>
            <a href="{{ route('characters.create') }}" class="btn btn-primary">Create your character</a>
            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">name</th>
                        <th scope="col">attack</th>
                        <th scope="col">defence</th>
                        <th scope="col">speed</th>
                        <th scope="col">life</th>
                        <th scope="col">type</th>
                        <th scope="col">items</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($characters as $character)
                        <tr>
                            <td>
                                <a href="{{ route('characters.show', $character) }}">{{ $character->name }}</a>
                            </td>
                            <td>{{ $character->attack }}</td>
                            <td>{{ $character->defence }}</td>
                            <td>{{ $character->speed }}</td>
                            <td>{{ $character->life }}</td>
                            <td>{{ $character->type->name }}</td>
                            <th>
                                @foreach ($character->items as $item)
                                    @if (!$loop->last)
                                        {{ $item->name }} -
                                    @else
                                        {{ $item->name }}
                                    @endif
                                @endforeach
                            </th>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Nessun personaggio trovato</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </section>
@endsection
