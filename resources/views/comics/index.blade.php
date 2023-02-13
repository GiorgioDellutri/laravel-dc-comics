@extends('layouts.app')

@section('main-content')
    @foreach ($comics as $comic)
        <p>{{ $comic->title }}</p>
    @endforeach
@endsection
