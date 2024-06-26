@extends('layouts.app')

@section('title', $title = "Types' list")

@section('content')
    <section>
        <div class="container py-4">
            <div class="row justify-content-between align-items-center">
                <h1 class="mb-3 col-6">{{ $title }}</h1>
                    <div class="col-2 d-flex justify-content-end">
                        <a class="btn btn-primary" href="{{ route('types.create') }}">Create a new type</a>
                    </div>
            </div>

            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Related Characters</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->name }}</td>
                        <td>{{ $type->slug }}</td>
                        <td>{{ sizeof($type->characters) }}</td>
                        <td class="text-center">
                            <a href="{{ route('types.show', $type) }}">
                                <i class="fa-solid fa-circle-info"></i>
                            </a>
                            <a href="{{ route('types.edit', $type) }}">
                                <i class="fa-solid fa-file-pen"></i>
                            </a>
                            <div class="d-inline-block">
                                <button class="border border-0 delete-button" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal-id{{ $type->id }}" data-title='{{ $type->name }}'>
                                    <i class="fa-solid fa-trash-can text-danger"></i>
                                </button>                              
                            </div>
                          </td>
                    </tr>
                    @endforeach
                  </tbody>
            </table>

            {{ $types->links() }}
        </div>
    </section>
@endsection

@section('modal')
    @foreach($types as $type)
        <div class="modal fade mt-5" id="deleteModal-id{{ $type->id }}" tabindex="-1" aria-labelledby="deleteModal-id{{ $type->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" action="{{ route('types.destroy' , $type) }}" method="POST">
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
    @endforeach
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        button.delete-button {
          padding: 0;
          margin: 0;
          background: none;
          display: flex;
          align-items: flex-start;
        }
      </style>
@endsection