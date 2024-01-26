<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'admin',
            'password' => \Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('admins')->insert($param);
    }
}
