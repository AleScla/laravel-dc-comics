@extends('layouts.app')

@section('page-title', 'Edit DC Comic')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Modifica il comic selezionato!</h1>
            </div>
            <div class="col">
                <form action="{{route('comics.update', ['comic' => $comic->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold fs-5">Titolo *</label>
                        <input type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            required
                            value="{{$comic->title}}"
                            placeholder="Inserisci il titolo...">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold fs-5">Descrizione *</label>
                        <textarea
                        class="form-control"
                        id="description"
                        name="description"
                        rows="3"
                        maxlength="4096"
                        required
                        
                        placeholder="Inserisci una descrizione">{{$comic->description}}</textarea>
                      </div>
                    <div class="mb-3">
                        <label for="thumb" class="form-label fw-bold fs-5">Link immagine</label>
                        <input
                        type="text"
                        class="form-control"
                        name="thumb"
                        id="thumb"
                        maxlength="4096"
                        value="{{$comic->thumb}}"
                        placeholder="Inserisci un link dell'immagine desiderata">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label fw-bold fs-5">Prezzo *</label>
                        <input
                        type="number"
                        class="form-control"
                        name="price"
                        id="price"
                        required
                        step="0.01"
                        value="{{$comic->price}}"
                        placeholder="Inserisci il prezzo">
                    </div>

                    <div class="mb-3">
                        <label for="series" class="form-label fw-bold fs-5">Serie *</label>
                        <input
                        type="text"
                        class="form-control"
                        name="series"
                        id="series"
                        maxlength="64"
                        required
                        value="{{$comic->series}}"
                        placeholder="Inserisci la serie in questione">
                    </div>

                    <div class="mb-3">
                        <label for="sale_date" class="form-label fw-bold fs-5">Data di uscita</label>
                        <input type="date"
                        class="form-control"
                        name="sale_date"
                        id="sale_date"
                        value="{{$comic->sale_date}}"
                        placeholder="Inserisci la data di uscita">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5" for="type">Scegli un tipo di fumetto</label>
                        <select class="form-select" id="type" name="type">
                            <option
                                @if (!isset($comic->type) || $comic->type == '')
                                    selected
                                @endif
                                disabled>
                                Scegli un tipo di fumetto
                            </option>

                            <option
                                @if ($comic->type == 'comic book')
                                    selected
                                @endif
                                value="comic book">
                                Comic Book
                            </option>

                            <option
                                @if ($comic->type == 'graphic novel')
                                selected
                                @endif
                                value="graphic novel">
                                Graphic Novel
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="artists" class="form-label fw-bold fs-5">Artisti</label>
                        <input type="text"
                        class="form-control"
                        name="artists"
                        id="artists"
                        placeholder="Inserisci gli artisti"
                        value="{{implode(', ', json_decode($comic->artists))}}">
                        <p>Attenzione! Inserisci i nomi degli artisti separati da virgole</p>
                    </div>

                    <div class="mb-3">
                        <label for="writers" class="form-label fw-bold fs-5">Scrittori</label>
                        <input type="text"
                        class="form-control"
                        name="writers"
                        id="writers"
                        value="{{implode(', ', json_decode($comic->writers))}}"
                        placeholder="Inserisci gli scrittori">
                        <p>Attenzione! Inserisci i nomi degli scrittori separati da virgole</p>
                    </div>


                    <button type="submit" class="btn btn-primary">Aggiorna le modifiche</button>
                </form>
            </div>
        </div>
    </div>
@endsection
