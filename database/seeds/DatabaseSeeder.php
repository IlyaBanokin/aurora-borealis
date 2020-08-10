<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(ShopCategoriesTableSeeder::class);
        factory(\App\Models\ShopProduct::class, 100)->create();
        factory(\App\Models\ShopBlog::class, 40)->create();
    }
}
