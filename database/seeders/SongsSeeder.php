<?php

use Illuminate\Database\Seeder;
use \App\Models\Song;

class SongsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $songs = [
            [
                'name' => 'По барам'
            ],
            [
                'name' => 'Русский подорожник'
            ],
            [
                'name' => 'Запахло весной'
            ],
        ];

        foreach ($songs as $song) {
            Song::create([
                'name' => $song['name'],
            ]);
        }
    }
}
