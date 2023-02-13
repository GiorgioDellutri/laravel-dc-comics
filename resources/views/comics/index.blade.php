@extends('layouts.app')

@section('main-content')
    <div class="container-fluid">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Series</th>
                    <th scope="col">Type</th>
                    <th scope="col">Sale date</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            @foreach ($comics as $comic)
                <tbody>
                    <tr>
                        <th scope="row">{{ $comic->id }}</th>
                        <td>{{ $comic->title }}</td>
                        <td>{{ $comic->series }}</td>
                        <td>{{ $comic->type }}</td>
                        <td>{{ $comic->sale_date }}</td>
                        <td>{{ $comic->price }}</td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection
