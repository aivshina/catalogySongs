<?php

use Illuminate\Database\Seeder;
use \App\Models\SingerSong;

class SingerSongsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $singersSongs = [
            [
                'song_id' => 1,
                'singer_id' => 1
            ],
            [
                'song_id' => 2,
                'singer_id' => 4
            ],
            [
                'song_id' => 3,
                'singer_id' => 5
            ],
        ];

        foreach ($singersSongs as $singerSong) {
            SingerSong::create([
                'song_id' => $singerSong['song_id'],
                'singer_id' => $singerSong['singer_id'],
            ]);
        }
    }
}
