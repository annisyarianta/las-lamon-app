<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NomorSertifikatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nomor_sertifikat')->insert([
            'nama' => 'Sertifikat Las Lamon',
            'nomor_awal' => 1,
            'nomor_akhir' => 1000,
            'kerangka_penomoran' => 'ADP-2026-001',
            'soft_delete' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
