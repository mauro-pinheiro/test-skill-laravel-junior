<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Models\Product;
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
        User::factory([
            'name' => 'admin@admin.com',
            'email' => 'admin@admin.com',
        ])->create();
        Client::factory(10)->create();
        Product::factory(100)->create();
    }
}
