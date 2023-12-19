<?php

namespace Database\Seeders;

use Datetime;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 4; $i++) {
            for ($j = 1; $j <= 10; $j++) {
                $param = [
                    'user_id' => $i,
                    'item_id' => $j + 7,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ];
                DB::table('favorites')->insert($param);
            }
        }
    }
}
