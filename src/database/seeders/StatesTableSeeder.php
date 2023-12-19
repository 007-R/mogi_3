<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '新品',
            'description' => '商品の状態は良好です。傷もありません。',
            'state' => '良好',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('states')->insert($param);
        $param = [
            'name' => '中古品',
            'description' => '多少傷はありますが、商品の状態に問題はありません。',
            'state' => '問題なし',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('states')->insert($param);
        $param = [
            'name' => '要注意',
            'description' => '目立つ傷がありますので、ご了承ください',
            'state' => '不良',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('states')->insert($param);
    }
}
