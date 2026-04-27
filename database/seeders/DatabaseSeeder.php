<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(UserSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CartSeeder::class);
        $this->call(CatalogueSeeder::class);
        $this->call(CartItemSeeder::class);
        $this->call(NumberCertificateSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(LocationSeeder::class);
    }
}
