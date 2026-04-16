<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukTanamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produk_tanaman')->insert([
            [
                'nama_produk' => 'Pohon Jati',
                'deskripsi' => 'Bibit pohon jati unggul untuk kayu berkualitas tinggi',
                'harga' => 15000,
                'url_gambar' => 'jati.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_produk' => 'Pohon Mahoni',
                'deskripsi' => 'Bibit pohon mahoni untuk penghijauan dan kayu industri',
                'harga' => 12000,
                'url_gambar' => 'mahoni.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_produk' => 'Pohon Sengon',
                'deskripsi' => 'Bibit sengon cepat tumbuh untuk bahan bangunan',
                'harga' => 10000,
                'url_gambar' => 'sengon.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_produk' => 'Pohon Akasia',
                'deskripsi' => 'Bibit akasia cocok untuk reboisasi dan industri kertas',
                'harga' => 9000,
                'url_gambar' => 'akasia.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_produk' => 'Pohon Pinus',
                'deskripsi' => 'Bibit pinus untuk penghijauan dan produksi getah',
                'harga' => 20000,
                'url_gambar' => 'pinus.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_produk' => 'Pohon Cemara',
                'deskripsi' => 'Bibit cemara untuk hiasan dan pelindung angin',
                'harga' => 18000,
                'url_gambar' => 'cemara.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_produk' => 'Pohon Trembesi',
                'deskripsi' => 'Bibit trembesi peneduh dengan kanopi lebar',
                'harga' => 25000,
                'url_gambar' => 'trembesi.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_produk' => 'Pohon Ketapang',
                'deskripsi' => 'Bibit ketapang cocok untuk peneduh di area panas',
                'harga' => 17000,
                'url_gambar' => 'ketapang.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_produk' => 'Pohon Beringin',
                'deskripsi' => 'Bibit beringin untuk peneduh dan estetika lingkungan',
                'harga' => 30000,
                'url_gambar' => 'beringin.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_produk' => 'Pohon Eucalyptus',
                'deskripsi' => 'Bibit eucalyptus untuk industri minyak dan kayu',
                'harga' => 22000,
                'url_gambar' => 'eucalyptus.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
