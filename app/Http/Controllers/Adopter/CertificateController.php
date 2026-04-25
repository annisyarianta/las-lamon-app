<?php

namespace App\Http\Controllers\Lsm;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function show(string $id)
    {
        // $data_order = Order::findOrFail(Crypt::decrypt($id));
        $data_order = Order::findOrFail($id);

        $data_user = $data_order->user;
        $data_kwitansi = $data_order->kwitansi;

        $data_order_items = $data_order->order_items()
            ->with([
                'katalog:id,nama_katalog,url_gambar',
                'produk:id,nama_produk'
            ])
            ->get();

        return view('adopter.certificate', compact(
            'data_kwitansi',
            'data_order',
            'data_user',
            'data_order_items',
            'amount_in_words'
        ));
    }
}