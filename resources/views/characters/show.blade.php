@extends('layouts.app')

@section('title', $title = "Character's detail")

@section('main-content')
<section>
  <div class="container py-4">
    <h1>Scheda di {{ $character->name }}</h1>
    <p>{{ $character->description }}</p>
  
    <div class="row">
        <div class="col-3">{{ $character->life }}</div>
        <div class="col-3">{{ $character->attack }}</div>
        <div class="col-3">{{ $character->defense }}</div>
        <div class="col-3">{{ $character->speed }}</div>
    </div>

  </div>

</section>
@endsection