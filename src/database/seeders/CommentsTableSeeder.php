<?php

namespace Database\Seeders;

use Datetime;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '2',
            'item_id' => '1',
            'content' => 'おしゃれでいいですね！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('comments')->insert($param);
        $param = [
            'user_id' => '2',
            'item_id' => '2',
            'content' => '素敵な色ですね！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('comments')->insert($param);
        $param = [
            'user_id' => '2',
            'item_id' => '3',
            'content' => 'もう少し安ければ欲しい',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('comments')->insert($param);
        $param = [
            'user_id' => '2',
            'item_id' => '4',
            'content' => '購入を検討しています。何年ものですか？',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('comments')->insert($param);
        $param = [
            'user_id' => '1',
            'item_id' => '4',
            'content' => 'ありがとうとざいます！購入して３年くらいです',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('comments')->insert($param);
        $param = [
            'user_id' => '2',
            'item_id' => '4',
            'content' => '傷んでいるところとか、気になる箇所はありますか？',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('comments')->insert($param);

    }
}
