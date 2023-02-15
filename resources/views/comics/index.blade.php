@extends('layouts.app')

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a class="btn btn-warning my-2 mx-2" href="{{ route('comics.create') }}">Create a new Comic</a>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Series</th>
                    <th scope="col">Type</th>
                    <th scope="col">Sale date</th>
                    <th scope="col">Price</th>
                    <th scope="col">Utilities</th>
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
                        <td>
                            <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-sm btn-success ">Show</a>
                            <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-sm btn-dark mx-2">Edit</a>
                            <form class="d-inline" action="{{ route('comics.destroy', $comic->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection
