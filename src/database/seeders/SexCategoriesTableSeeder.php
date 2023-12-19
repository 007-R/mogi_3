<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class SexCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'メンズ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('sex_categories')->insert($param);
        $param = [
            'name' => 'レディース',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('sex_categories')->insert($param);
    }
}
