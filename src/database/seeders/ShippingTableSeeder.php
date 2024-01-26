<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class ShippingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'description' => '購入後、即発送いたします。',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('shippings')->insert($param);
        $param = [
            'description' => '発送時期は、要相談',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('shippings')->insert($param);
    }
}
