<?php

namespace Database\Seeders;

use App\Models\Character;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $characters = config('characters');
       $data = $characters['characters'];

       foreach($data as $single_data){
        $character = new Character;

        $character->fill($single_data);
        $character->save();

       }
    }
}
