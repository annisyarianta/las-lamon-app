<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locations')->insert([
            [
                'name' => 'Taman Kupu-Kupu Gita Persada',
                'location_url' => 'https://maps.app.goo.gl/nbmeLowyPJzk3Azk7',
                'soft_delete' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Taman Keanekaragaman Hayati (Taman Kehati)',
                'location_url' => 'https://maps.app.goo.gl/3M38VR8mQjLa9KgZ7',
                'soft_delete' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
          
        ]);
    }
}
