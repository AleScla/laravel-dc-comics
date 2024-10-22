@php
    $ComicArtists = json_decode($comic->artists);
    $ComicWriters = json_decode($comic->writers);

@endphp

@extends('layouts.app')

@section('page-title', $comic->title)

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1></h1>
            </div>
        </div>
        <a href="/">Clicca qui per tornare alla lista dei link</a>

        <div class="row">
            <div class="col">
                <div class="card mb-3 w-100">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{$comic->thumb}}" class="img-fluid rounded-start" alt="{{$comic->title}}">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title fs-1">{{$comic->title}}</h5>
                          <p class="card-text fs-5">{{$comic->description}}</p>
                          <p class="card-text fs-5 text-success">Genre: {{$comic->type}}</p>
                          <p class="card-text fs-5">Price: {{$comic->price}}€</p>
                          <p class="card-text fs-5">Date: {{$comic->sale_date}}</p>
                          <p class="card-text fs-5">Series: {{$comic->series}}</p>

                          <p class="card-text fs-5">
                            Artists:
                            <ul>
                                @foreach ($ComicArtists as $comicArtist)
                                    <li>{{$comicArtist}}</li>
                                @endforeach
                            </ul>
                          </p>
                          <p class="card-text fs-5">
                            Writers:
                            <ul>
                                @foreach ($ComicWriters as $comicWriter)
                                    <li>{{$comicWriter}}</li>
                                @endforeach
                            </ul>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>

@endsection
