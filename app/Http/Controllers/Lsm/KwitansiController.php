<?php

namespace App\Http\Controllers\Lsm;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class KwitansiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
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

        $amount_in_words = strtoupper(
            trim($this->numberToWords($data_order->total_harga)) . ' Rupiah'
        );

        

        return view('adopter.kwitansi', compact(
            'data_kwitansi',
            'data_order',
            'data_user',
            'data_order_items',
            'amount_in_words'
        ));
    }

    public function numberToWords($number)
    {
        $formatter = new \NumberFormatter("en", \NumberFormatter::SPELLOUT);
        return $formatter->format($number);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
