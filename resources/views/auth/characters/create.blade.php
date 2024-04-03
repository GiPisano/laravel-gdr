@extends('layouts.app')

@section('title', $title = "Create a new character")

@section('content')
<section>
  <div class="container py-4">
    <h1>{{ $title }}</h1>

    <form action="{{ route('characters.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label">Character name</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
      </div>
      <div class="mb-3">
        <label for="life" class="form-label">Character max life</label>
        <input type="number" class="form-control" id="life" name="life">
      </div>
      <div class="mb-3">
        <label for="attack" class="form-label">Character max attack</label>
        <input type="number" class="form-control" id="attack" name="attack">
      </div>
      <div class="mb-3">
        <label for="defence" class="form-label">Character max defence</label>
        <input type="number" class="form-control" id="defence" name="defence">
      </div>
      <div class="mb-3">
        <label for="speed" class="form-label">Character max speed</label>
        <input type="number" class="form-control" id="speed" name="speed">
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>

  </div>

</section>
@endsection