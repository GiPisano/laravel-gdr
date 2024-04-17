@extends('layouts.app')

@section('title', "Type's detail'")

@section('content')
    <section>
        <div class="container py-4">
            <div class="row justify-content-between align-items-center">
                <h1 class="mb-3 col-6">{{ $type->name }}</h1>
                <div class="col-2 d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{ route('types.index')}}">types' list</a>
                </div>
                <div class="col-2 d-flex justify-content-end">
                    <a class="btn btn-primary ms-2" href="{{ route('types.edit', $type) }}">Modify this type</a>
                    <button type="submit" class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete this type</button>
                </div>

                {{-- <div class="col-6">
                    <img class="img-fluid" src="{{ $type->image }}" alt="#">
                </div> --}}
                
                <div class="mb-3">                  
                    <div>
                        <p>{{ $type->description }}</p>
                    </div>            
                </div>
                
            </div>

            <h2>Related characters:</h2>
            <p>
                @foreach($type->characters as $character)
                    @if($loop->first) 
                        <a href="{{ route('characters.show', $character)}}">{{ $character->name }}</a>
                    @else
                        - <a href="{{ route('characters.show', $character)}}">{{ $character->name }}</a>
                    @endif
                @endforeach
            </p>
            
        </div>
    </section>
@endsection

@section('modal')
    <div class="modal fade mt-5" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('types.destroy', $type) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-danger">Attention!</h1>
                </div>
                <div class="modal-body">
                    <p>
                        You are about to delete the {{ $type->name }} type. <br>
                        This action is <b>permanent</b>. <br>
                        Please confirm if you want to proceed.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
@endsection