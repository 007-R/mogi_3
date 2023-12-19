<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'description' => '購入後、即事発送します。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('stocks')->insert($param);
        $param = [
            'description' => '購入後、１週間以内に発送します。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('stocks')->insert($param);
        $param = [
            'description' => '現在手元にないため、要相談。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('stocks')->insert($param);
    }
}
