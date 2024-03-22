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
                        <th scope="col">slug</th>
                        <th scope="col">category</th>
                        <th scope="col">type</th>
                        <th scope="col">weight</th>
                        <th scope="col">cost</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>

                            <td>{{ $item->name }}</td>
                            <td>{{ $item->slug }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->weight }}</td>
                            <td>{{ $item->cost }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>
@endsection
