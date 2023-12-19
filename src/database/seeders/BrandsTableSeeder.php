<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'Asics',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('brands')->insert($param);
        $param = [
            'name' => 'Adidas',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('brands')->insert($param);
        $param = [
            'name' => 'PUMA',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('brands')->insert($param);
        $param = [
            'name' => 'New Balance',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('brands')->insert($param);
    }
}
