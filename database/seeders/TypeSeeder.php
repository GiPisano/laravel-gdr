<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = fopen(__DIR__ . '/../csv/types.csv', 'r');

        $is_first_line = true;

        while (!feof($file)) {
            $data = fgetcsv($file);

            if ($data) {
                if (!$is_first_line) {
                    $type = new Type();
                    $type->name = $data[0];
                    $type->slug = Str::slug($type->name, '-');
                    $type->image = $data[1];
                    $type->description = $data[2];
                    $type->save();
                }
            }
            $is_first_line = false;
        }
    }
}
