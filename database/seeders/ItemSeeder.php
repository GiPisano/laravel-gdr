<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = fopen(__DIR__ . '/../csv/items.csv', 'r');

        $is_first_line = true;
        while (!feof($file)) {
            $data = fgetcsv($file);

            if ($data) {
                if (!$is_first_line) {
                    $item = new Item();
                    $item->name = $data[0];
                    $item->slug = $data[1];
                    $item->type = $data[2];
                    $item->category = $data[3];
                    $item->weight = $data[4];
                    $item->cost = $data[5];
                    $item->save();
                }
            }

            $is_first_line = false;
        };
    }
}
