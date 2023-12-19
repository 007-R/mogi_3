<?php

namespace Database\Seeders;

use Datetime;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PurchasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'item_id' => '1',
            'address_id' => '1',
            'payment_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('purchases')->insert($param);
        $param = [
            'user_id' => '1',
            'item_id' => '2',
            'address_id' => '1',
            'payment_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('purchases')->insert($param);
        $param = [
            'user_id' => '1',
            'item_id' => '3',
            'address_id' => '1',
            'payment_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('purchases')->insert($param);
    }
}
