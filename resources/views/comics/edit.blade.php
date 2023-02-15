@extends('layouts.app')

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-4 m-auto">
                {{-- @dump($comic->id)
                @dump($comic) --}}
                <form action="{{ route('comics.update', $comic->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Thumb</label>
                        <input type="text" class="form-control" id="title" name="thumb" value="{{ $comic->thumb }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $comic->title }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-block">Description</label>
                        <textarea name="description" class="form-control">{{ $comic->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" id="title" name="price"
                            value="{{ $comic->price }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Series</label>
                        <input type="text" class="form-control" id="title" name="series"
                            value="{{ $comic->series }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Type</label>
                        <input type="text" class="form-control" id="title" name="type"
                            value="{{ $comic->type }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sale date</label>
                        <input type="text" class="form-control" id="title" name="sale_date"
                            value="{{ $comic->sale_date }}">
                    </div>
                    <button type="submit" class="btn btn-warning">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
