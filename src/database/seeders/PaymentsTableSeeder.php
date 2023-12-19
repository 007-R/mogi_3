<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'コンビニ払い',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('payments')->insert($param);
        $param = [
            'name' => 'クレジット払い',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('payments')->insert($param);
        $param = [
            'name' => '着払い',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('payments')->insert($param);
    }
}
