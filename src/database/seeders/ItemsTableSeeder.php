<?php

namespace Database\Seeders;

use Datetime;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
        'name' => '帽子',
        'price' => 1000,
        'image' => "storage/img/sample01.png",
        'description' => '小さな子供向けです。',
        'brand_id' => '3',
        'color_id' => '2',
        'genre_category_id' => '2',
        'sex_category_id' => '1',
        'state_id' => '1',
        'user_id' => '2',
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'パーカー',
            'price' => 5000,
            'image' => "storage/img/sample02.png",
            'description' => '肌寒い季節に重宝します',
            'brand_id' => '1',
            'color_id' => '3',
            'genre_category_id' => '1',
            'sex_category_id' => '1',
            'state_id' => '2',
            'user_id' => '2',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => '靴',
            'price' => 2000,
            'image' => "storage/img/sample03.png",
            'description' => 'ランニングにどうぞ。',
            'brand_id' => '4',
            'color_id' => '1',
            'genre_category_id' => '1',
            'sex_category_id' => '1',
            'state_id' => '2',
            'user_id' => '2',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'セーター',
            'price' => 4000,
            'image' => "storage/img/sample04.png",
            'description' => '薄いので春秋におすすめです。',
            'brand_id' => '2',
            'color_id' => '3',
            'genre_category_id' => '1',
            'sex_category_id' => '2',
            'state_id' => '2',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'シャツ',
            'price' => 6500,
            'image' => "storage/img/sample05.png",
            'description' => 'おしゃれなカラーのシャツです。',
            'brand_id' => '3',
            'color_id' => '3',
            'genre_category_id' => '1',
            'sex_category_id' => '2',
            'state_id' => '1',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'キュロット',
            'price' => 1800,
            'image' => "storage/img/sample06.png",
            'description' => '高学年のお子様にどうぞ。',
            'brand_id' => '3',
            'color_id' => '4',
            'genre_category_id' => '1',
            'sex_category_id' => '2',
            'state_id' => '2',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'ズボン',
            'price' => 6400,
            'image' => "storage/img/sample07.png",
            'description' => 'ストレッチ素材のため動きやすいです。',
            'brand_id' => '2',
            'color_id' => '1',
            'genre_category_id' => '1',
            'sex_category_id' => '1',
            'state_id' => '2',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'ズボン',
            'price' => 4300,
            'image' => "storage/img/sample08.png",
            'description' => '小さな子供向けです。',
            'brand_id' => '4',
            'color_id' => '3',
            'genre_category_id' => '1',
            'sex_category_id' => '2',
            'state_id' => '1',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'リュック',
            'price' => 8700,
            'image' => "storage/img/sample09.png",
            'description' => 'とても軽くて普段使いにいいです！',
            'brand_id' => '2',
            'color_id' => '1',
            'genre_category_id' => '2',
            'sex_category_id' => '1',
            'state_id' => '2',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'シューズ',
            'price' => 2400,
            'image' => "storage/img/sample10.png",
            'description' => '少々古いですが、ランニング用にどうぞ',
            'brand_id' => '1',
            'color_id' => '3',
            'genre_category_id' => '1',
            'sex_category_id' => '1',
            'state_id' => '2',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'セーター',
            'price' => 3000,
            'image' => "storage/img/sample11.png",
            'description' => '鮮やかな色のセータです',
            'brand_id' => '2',
            'color_id' => '4',
            'genre_category_id' => '1',
            'sex_category_id' => '2',
            'state_id' => '2',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'セーター',
            'price' => 7500,
            'image' => "storage/img/sample12.png",
            'description' => '少々古いですが、アンティーク感があります',
            'brand_id' => '1',
            'color_id' => '5',
            'genre_category_id' => '1',
            'sex_category_id' => '2',
            'state_id' => '3',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'セーター',
            'price' => 2100,
            'image' => "storage/img/sample13.png",
            'description' => '落ち着いた渋めのセーターです',
            'brand_id' => '1',
            'color_id' => '3',
            'genre_category_id' => '1',
            'sex_category_id' => '1',
            'state_id' => '3',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => 'タートルネックセーター',
            'price' => 4400,
            'image' => "storage/img/sample14.png",
            'description' => 'おしゃれなお子様向け！',
            'brand_id' => '1',
            'color_id' => '3',
            'genre_category_id' => '1',
            'sex_category_id' => '2',
            'state_id' => '2',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => '帽子',
            'price' => 89000,
            'image' => "storage/img/sample15.png",
            'description' => 'おしゃれなおじさまにピッタリ',
            'brand_id' => '1',
            'color_id' => '1',
            'genre_category_id' => '1',
            'sex_category_id' => '1',
            'state_id' => '2',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => '帽子',
            'price' => 2000,
            'image' => "storage/img/sample16.png",
            'description' => 'ちょっとしたお出かけに重宝します',
            'brand_id' => '3',
            'color_id' => '4',
            'genre_category_id' => '2',
            'sex_category_id' => '1',
            'state_id' => '3',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('items')->insert($param);
        $param = [
            'name' => '帽子',
            'price' => 4000,
            'image' => "storage/img/sample17.png",
            'description' => 'これで美味しい料理ができるはず',
            'brand_id' => '4',
            'color_id' => '2',
            'genre_category_id' => '2',
            'sex_category_id' => '1',
            'state_id' => '2',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('items')->insert($param);

    }

}