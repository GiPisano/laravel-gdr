@extends('layouts.app')

@section('title', $title = 'Update character')

@section('content')
    <section>
        <div class="container py-4">
            <h1>{{ $title }}</h1>

            <form action="{{ route('characters.update', $character) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="name" class="form-label">Character name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $character->name }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $character->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="life" class="form-label">Character max life</label>
                    <input type="number" class="form-control" id="life" name="life" value="{{ $character->life }}">
                </div>
                <div class="mb-3">
                    <label for="attack" class="form-label">Character max attack</label>
                    <input type="number" class="form-control" id="attack" name="attack"
                        value="{{ $character->attack }}">
                </div>
                <div class="mb-3">
                    <label for="defence" class="form-label">Character max defence</label>
                    <input type="number" class="form-control" id="defence" name="defence"
                        value="{{ $character->defence }}">
                </div>
                <div class="mb-3">
                    <label for="speed" class="form-label">Character max speed</label>
                    <input type="number" class="form-control" id="speed" name="speed"
                        value="{{ $character->speed }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>

    </section>
@endsection
