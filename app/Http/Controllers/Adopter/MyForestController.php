<?php

namespace App\Http\Controllers\Adopter;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class MyForestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Order::where('id_user', auth()->id())
            ->where('status_order', 'paid')
            ->with([
                'order_items' => function ($q) {
                    $q->where('soft_delete', 0)
                        ->select(
                            'id',
                            'id_order',
                            'id_produk',
                            'id_katalog',
                            'id_lokasi',
                            'kuantitas'
                        );
                },
                'order_items.katalog:id,nama_katalog',
                'order_items.produk:id,nama_produk',
                'order_items.lokasi:id,url_lokasi'
            ])
            ->select('id')
            ->get();

        // return response()->json([
        //     'message' => 'List of my forest items',
        //     'data' => $data,
        // ], 200);
        return view('adopter.myforest', compact('data'));
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
        //
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
