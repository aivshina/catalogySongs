<?php

use Illuminate\Database\Seeder;
use \App\Models\Singer;

class SingersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $singers = [
            [
                'name' => 'Анна Асти',
                'genre_id' => '1'
            ],
            [
                'name' => 'Сергей Лазарев',
                'genre_id' => '1'
            ],
            [
                'name' => 'ST',
                'genre_id' => '2'
            ],
            [
                'name' => '25/17',
                'genre_id' => '2'
            ],
            [
                'name' => 'Бутырка',
                'genre_id' => '3'
            ],
            [
                'name' => 'Михаил круг',
                'genre_id' => '3'
            ],
        ];

        foreach ($singers as $singer) {
            Singer::create([
                'name' => $singer['name'],
                'genre_id' => $singer['genre_id'],
            ]);
        }
    }
}
