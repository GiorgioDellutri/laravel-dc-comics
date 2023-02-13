@extends('layouts.app')
@section('title' . $comic->title)
@section('main-content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 d-flex justify-content-center">
                <div class="card" style="width: 20rem;">
                    <img src="{{ $comic->thumb }}" class="card-img-top" alt="comic img">
                    <div class="card-body ">
                        <h3 class="text-center">Title: {{ $comic->title }}</h3>
                        <p>Description: {{ $comic->description }}</p>
                        <p>Series: {{ $comic->series }}</p>
                        <p>Price: {{ $comic->price }} $</p>
                    </div>
                </div>
            </div>
        </div>
    @endsection
