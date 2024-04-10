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
                    <label for="intelligence" class="form-label">Character max intelligence</label>
                    <input type="number" class="form-control" id="intelligence" name="intelligence"
                        value="{{ $character->intelligence }}">
                </div>
                <div class="mb-3">
                    <label for="strength" class="form-label">Character max strength</label>
                    <input type="number" class="form-control" id="strength" name="strength"
                        value="{{ $character->strength }}">
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
                <div class="mb-3">
                    <label class="form-lable" for="type_id">Type</label>
                    <select name="type_id" id="type_id" class="form-select">
                        <option value="" class="d-none">select a type</option>
                        @foreach ($types as $type)
                            <option @if (old('type_id') ?? $character->type_id == $type->id) selected @endif value="{{ $type->id }}">
                                {{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb3">
                    <div class="form-lable mb-1">Items</div>
                    <div class="d-flex flex-wrap">
                        @foreach ($items as $item)
                            <div>
                                <input {{ in_array($item->id, old('items', $items_id ?? [])) ? 'checked' : '' }}
                                    type="checkbox" name="items[]" id="item-{{ $item->id }}"
                                    value="{{ $item->id }}">
                                <label for="item-{{ $item->id }}" class="me-1">{{ $item->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>

        </div>

    </section>
@endsection
