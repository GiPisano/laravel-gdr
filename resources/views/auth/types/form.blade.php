@extends('layouts.app')

@section('title')
    @if(!isset($type->id))
       {{ $title = 'Create new type' }}
    @else
        {{ $title = 'change ' . $type->name }}
    @endif
@endsection

@section('content')

    <section>
        <div class="container py-4">
            <h1 class="mb-5">{{ $title }}</h1>

            <form action="@if(!isset($type->id)) {{ route('types.store') }} @else {{ route('types.update', $type) }} @endif" method="POST">
                @csrf
                @if(isset($type->id))
                    @method('PATCH')
                @endif

                <div class="row flex-wrap mb-2">
                    <div class="col-6 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $type->name ?? '' }}"/>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea
                            class="form-control mb-3 @error('description') is-invalid @enderror"
                            id="description"
                            name="description"
                            rows="4"
                        >{{ old('description') ?? $type->description ?? '' }}</textarea>
                        @error('description')
                            <div class="invalid-feedback mb-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>

            </form>
        </div>
    </section>    
@endsection