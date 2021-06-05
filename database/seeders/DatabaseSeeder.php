<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Models\Product;
use App\Models\ProductType;
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
        // User::factory([
        //     'name' => 'Admin',
        //     'email' => 'admin@admin.com',
        // ])->create();
        Client::factory(10)->create();
        ProductType::factory(5)->create();
        Product::factory(100)->create();
    }
}
