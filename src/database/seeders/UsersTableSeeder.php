<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'サンプル太郎',
            'email' => 'shaftsbury_works@yahoo.co.jp',
            'image' => 'storage/user/sample01.png',
            'address_id' => '1',
            'password' => \Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'サンプル次郎',
            'email' => '2@sample',
            'image' => 'storage/user/sample02.png',
            'address_id' => null,
            'password' => \Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'サンプル三郎',
            'email' => '3@sample',
            'image' => 'storage/user/sample03.png',
            'address_id' => null,
            'password' => \Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'サンプル花子',
            'email' => '4@sample',
            'image' => 'storage/user/sample04.png',
            'address_id' => null,
            'password' => \Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('users')->insert($param);
    }
}
