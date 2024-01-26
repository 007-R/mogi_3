<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AddressesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(MastersTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call(ShippingTableSeeder::class);
        $this->call(GenreCategoriesTableSeeder::class);
        $this->call(SexCategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(FavoritesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(PurchasesTableSeeder::class);
        $this->call(StaffTableSeeder::class);
        Comment::factory()->count(100)->create();

    }
}
