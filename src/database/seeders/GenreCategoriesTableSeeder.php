<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class GenreCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '洋服',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('genre_categories')->insert($param);
        $param = [
            'name' => '小物',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('genre_categories')->insert($param);
    }
}
