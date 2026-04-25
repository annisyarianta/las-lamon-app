<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Pohon Jati',
                'description' => 'Bibit pohon jati unggul untuk kayu berkualitas tinggi',
                'price' => 15000,
                'image_url' => 'jati.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pohon Mahoni',
                'description' => 'Bibit pohon mahoni untuk penghijauan dan kayu industri',
                'price' => 12000,
                'image_url' => 'mahoni.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pohon Sengon',
                'description' => 'Bibit sengon cepat tumbuh untuk bahan bangunan',
                'price' => 10000,
                'image_url' => 'sengon.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pohon Akasia',
                'description' => 'Bibit akasia cocok untuk reboisasi dan industri kertas',
                'price' => 9000,
                'image_url' => 'akasia.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pohon Pinus',
                'description' => 'Bibit pinus untuk penghijauan dan produksi getah',
                'price' => 20000,
                'image_url' => 'pinus.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pohon Cemara',
                'description' => 'Bibit cemara untuk hiasan dan pelindung angin',
                'price' => 18000,
                'image_url' => 'cemara.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pohon Trembesi',
                'description' => 'Bibit trembesi peneduh dengan kanopi lebar',
                'price' => 25000,
                'image_url' => 'trembesi.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pohon Ketapang',
                'description' => 'Bibit ketapang cocok untuk peneduh di area panas',
                'price' => 17000,
                'image_url' => 'ketapang.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pohon Beringin',
                'description' => 'Bibit beringin untuk peneduh dan estetika lingkungan',
                'price' => 30000,
                'image_url' => 'beringin.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pohon Eucalyptus',
                'description' => 'Bibit eucalyptus untuk industri minyak dan kayu',
                'price' => 22000,
                'image_url' => 'eucalyptus.jpg',
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
