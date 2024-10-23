@extends('layouts.app')

@section('page-title', 'Home DC Comics')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Comics List</h1>
            </div>
        </div>
        <a href="/">Click here to see all the links</a>
        <a href="{{route('comics.create')}}" class="btn btn-primary ms-5">Add a new comic +</a>

        <div class="row">
            @foreach ($comics as $comic)
                <div class="col-4 g-5">
                    <div class="card">
                        <img src="{{$comic->thumb}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$comic->title}}</h5>
                            <p class="card-text"><strong>Price:</strong> {{$comic->price}} €</p>
                            <p class="card-text"><strong>Type:</strong> {{$comic->type}}</p>
                            <a href="{{route('comics.show', ['comic' => $comic->id])}}" class="btn btn-primary">More info about it</a>
                            <a href="{{route('comics.edit', ['comic' => $comic->id])}}" class="btn btn-primary">Edit this comic</a>
                            <form
                            onsubmit="return confirm('WARNING: You\'re trying to delete this comic definitively. Are you sure about this? This action cannot be reverted')"
                            method="POST" action="{{route('comics.destroy', ['comic' => $comic->id])}}" class="d-inline-block my-2">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete this comic</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
