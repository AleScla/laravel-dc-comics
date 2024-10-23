@extends('layouts.app')

@section('page-title', 'Home DC Comics')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Lista Comics</h1>
            </div>
        </div>
        <a href="/">Clicca qui per tornare alla lista dei link</a>
        <a href="{{route('comics.create')}}" class="btn btn-primary">Aggiungi un nuovo comic</a>

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
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
