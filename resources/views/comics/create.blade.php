@extends('layouts.app')

@section('page-title', 'Crea un DC Comic')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Inserisci un nuovo comic!</h1>
            </div>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col">
                <form action="{{route('comics.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold fs-5">Titolo *</label>
                        <input type="text"
                         class="form-control"
                          id="title"
                          name="title"
                          required
                          minlength="3"
                          maxlength="128"
                          placeholder="Inserisci il titolo...">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold fs-5">Descrizione *</label>
                        <textarea
                        class="form-control"
                        id="description"
                        name="description"
                        rows="3"
                        minlength="10"
                        maxlength="4096"
                        required
                        placeholder="Inserisci una descrizione"></textarea>
                      </div>
                    <div class="mb-3">
                        <label for="thumb" class="form-label fw-bold fs-5">Link immagine</label>
                        <input
                        type="text"
                        class="form-control"
                        name="thumb"
                        id="thumb"
                        maxlength="4096"
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
                        placeholder="Inserisci il prezzo">
                    </div>

                    <div class="mb-3">
                        <label for="series" class="form-label fw-bold fs-5">Serie *</label>
                        <input
                        type="text"
                        class="form-control"
                        name="series"
                        id="series"
                        minlength="5"
                        maxlength="64"
                        required
                        placeholder="Inserisci la serie in questione">
                    </div>

                    <div class="mb-3">
                        <label for="sale_date" class="form-label fw-bold fs-5">Data di uscita</label>
                        <input type="date"
                        class="form-control"
                        name="sale_date"
                        id="sale_date"
                        placeholder="Inserisci la data di uscita">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold fs-5" for="type">Scegli un tipo di fumetto</label>
                        <select class="form-select" id="type" name="type">
                            <option selected disabled>Scegli un tipo di fumetto</option>
                            <option value="comic book">Comic Book</option>
                            <option value="graphic novel">Graphic Novel</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="artists" class="form-label fw-bold fs-5">Artisti</label>
                        <input type="text"
                        class="form-control"
                        name="artists"
                        id="artists"
                        maxlength="1024"
                        placeholder="Inserisci gli artisti">
                        <p>Attenzione! Inserisci i nomi degli artisti separati da virgole</p>
                    </div>

                    <div class="mb-3">
                        <label for="writers" class="form-label fw-bold fs-5">Scrittori</label>
                        <input type="text"
                        class="form-control"
                        name="writers"
                        id="writers"
                        maxlength="1024"
                        placeholder="Inserisci gli scrittori">
                        <p>Attenzione! Inserisci i nomi degli scrittori separati da virgole</p>
                    </div>


                    <button type="submit" class="btn btn-primary">Aggiungi</button>
                </form>
            </div>
        </div>
    </div>
@endsection
