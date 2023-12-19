<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'postcode' => '0200834',
            'address' => '盛岡市永井',
            'building' => '〇〇ビル',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('addresses')->insert($param);
    }
}
