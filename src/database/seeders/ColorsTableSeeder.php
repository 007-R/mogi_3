<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'ブラック',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('colors')->insert($param);
        $param = [
            'name' => 'ホワイト',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('colors')->insert($param);
        $param = [
            'name' => 'ブルー',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('colors')->insert($param);
        $param = [
            'name' => 'レッド',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('colors')->insert($param);
        $param = [
            'name' => 'パープル',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('colors')->insert($param);
        $param = [
            'name' => 'グレー',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('colors')->insert($param);
    }
}
