<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('katalog')->insert([
            [
                'nama_katalog' => 'Paket Satuan',
                'mini_deskripsi' => 'Donasi 1, 3, atau 8 bibit pohon.',
                'deskripsi' => 'Paket donasi sederhana untuk individu yang ingin berkontribusi dalam penghijauan.',
                'url_gambar' => 'paket-satuan.png',
                'harga' => 0,
                'output' => 'E-Sertifikat Reguler',
                'target' => 'Individu dan Pelajar',
                'soft_delete' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_katalog' => 'Paket Hutan Mini',
                'mini_deskripsi' => 'Pembangunan satu blok hutan seluas 200 m2 dengan penanaman padat.',
                'deskripsi' => 'Paket penghijauan skala menengah untuk komunitas dan perusahaan.',
                'url_gambar' => 'paket-hutan-mini.png',
                'harga' => 500000,
                'output' => 'Papan Nama Fisik & Dashboard Khusus',
                'target' => 'Perusahaan (CSR) & Komunitas',
                'soft_delete' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_katalog' => 'Paket Khusus',
                'mini_deskripsi' => 'Pengayaan Daerah Aliran Sungai (DAS) dan kolaborasi pelestarian.',
                'deskripsi' => 'Paket kolaborasi khusus dengan laporan dan kebutuhan yang bisa disesuaikan.',
                'url_gambar' => 'paket-khusus.png',
                'harga' => 0,
                'output' => 'Laporan Kolaborasi Kustom',
                'target' => 'NGO, Institusi, & Kolaborasi Eksternal',
                'soft_delete' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
