<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class MastersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'name' => 'CC_STORE',
            'password' => \Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('masters')->insert($param);
        $param = [
            'user_id' => 1,
            'name' => 'DD_STORE',
            'password' => \Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('masters')->insert($param);
    }
}
