<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lokasi')->insert([
            [
                'nama_lokasi' => 'Taman Kupu-Kupu Gita Persada',
                'url_lokasi' => 'https://maps.app.goo.gl/nbmeLowyPJzk3Azk7',
                'soft_delete' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lokasi' => 'Taman Keanekaragaman Hayati (Taman Kehati)',
                'url_lokasi' => 'https://maps.app.goo.gl/3M38VR8mQjLa9KgZ7',
                'soft_delete' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
          
        ]);
    }
}
