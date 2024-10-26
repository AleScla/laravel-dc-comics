<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Comic;
class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::get();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->all() andrà a prendere i dati della richiesta dell'utente, qui verrà effettuata
        // un'eventuale validazione e tramite model verranno pushati in db
        $data = $request->all();

        $floattedPrice=floatval($data['price']);
        $data['price'] = $floattedPrice;


        $explodeArtists = explode(',', $data['artists']);
        $data['artists'] = json_encode($explodeArtists);

        $explodeWriters = explode(',', $data['writers']);
        $data['writers'] = json_encode($explodeWriters);

        $comic = Comic::Create($data);

        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {

        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();

        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        $comic->series = $data['series'];


        $comic->price = floatval($data['price']);

        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];

        $explodeArtists = explode(',', $data['artists']);
        $comic->artists = json_encode($explodeArtists);

        $explodeWriters = explode(',', $data['writers']);
        $comic->writers = json_encode($explodeWriters);

        $comic->save();

        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
