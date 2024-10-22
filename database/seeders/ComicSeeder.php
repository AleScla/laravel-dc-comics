<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;

class ComicSeeder extends Seeder
{
    public function run(): void

    {
        Comic::truncate();
        $comics = config('comics');

        foreach($comics as $comic){
            $newComic = new Comic();
            $newComic->title = $comic['title'];
            $newComic->description = $comic['description'];
            $newComic->thumb = $comic['thumb'];
            $explodedPrice = explode('$', $comic['price']);
            $newComic->price = $explodedPrice[1];
            $newComic->series = $comic['series'];
            $newComic->sale_date = $comic['sale_date'];
            $newComic->type = $comic['type'];
            $newComic->artists = json_encode($comic['artists']);
            $newComic->writers = json_encode($comic['writers']);
            $newComic->save();
        }
    }
}
