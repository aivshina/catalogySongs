<?php

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            [
                'name' => 'Поп-музыка'
            ],
            [
                'name' => 'Хип-хоп'
            ],
            [
                'name' => 'Шансон'
            ],

        ];

        foreach ($genres as $genre) {
            Genre::create([
                'name' => $genre['name'],
            ]);
        }
    }
}
