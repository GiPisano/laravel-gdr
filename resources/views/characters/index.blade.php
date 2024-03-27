@extends('layouts.app')

@section('title', 'Pagina iniziale')

@section('main-content')
<section>
  <div class="container py-4">
    <h1>Laravel with Bootstrap + Vite</h1>
    <table class="table">
      <thead>
        <tr>

          <th scope="col">name</th>
          <th scope="col">attack</th>
          <th scope="col">defence</th>
          <th scope="col">speed</th>
          <th scope="col">life</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($characters as $character)
        <tr>
          <td>{{ $character->name }}</td>
          <td>{{ $character->attack }}</td>
          <td>{{ $character->defence }}</td>
          <td>{{ $character->speed }}</td>
          <td>{{ $character->life }}</td>
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