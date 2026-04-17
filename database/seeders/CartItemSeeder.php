<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cart_item')->insert([
            [
                'id_cart' => 1,
                'id_produk' => 1,
                'id_katalog' => 1,
                'kuantitas' => 2,
                'harga_satuan' => 15000,
                'harga_total' => 30000,
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id_cart' => 1,
                'id_produk' => 2,
                'id_katalog' => 1,
                'kuantitas' => 1,
                'harga_satuan' => 12000,
                'harga_total' => 12000,
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'id_cart' => 1,
                'id_produk' => null,
                'id_katalog' => 2,
                'kuantitas' => 1,
                'harga_satuan' => 20000,
                'harga_total' => 20000,
                'soft_delete' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
