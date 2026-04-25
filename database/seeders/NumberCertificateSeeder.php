<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NumberCertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('number_certificates')->insert([
            'name' => 'Sertifikat Las Lamon',
            'last_number' => 1,
            'numbering_pattern' => 'ADP-2026-001',
            'soft_delete' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
