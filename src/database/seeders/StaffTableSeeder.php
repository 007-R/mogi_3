<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 2,
            'master_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('staff')->insert($param);
        $param = [
            'user_id' => 4,
            'master_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('staff')->insert($param);
    }
}
