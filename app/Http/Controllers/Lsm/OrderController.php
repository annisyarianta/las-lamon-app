<?php

namespace App\Http\Controllers\Lsm;

use App\Http\Controllers\Controller;
use App\Models\NomorSertifikat;
use App\Models\Order;
use App\Models\Sertifikat;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Order::where('soft_delete', 0)->get();

        // return view('lsm.order.index', compact('data'));
        return response()->json([
            'message' => 'List of orders',
            'data' => $data,
        ], 200);
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
        $data = Order::findOrFail($id);

        // return view('lsm.order.show', compact('data'));
        return response()->json([
            'message' => 'Order details',
            'data' => $data,
        ], 200);
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

    public function confirmOrder(string $id)
    {
        $order = Order::findOrFail($id);
        $user = $order->user;
        $order->status_order = 'paid';
        $order->save();

        $data__nomor_sertifikat = NomorSertifikat::where('soft_delete', 0)->first();
        $data_sertifikat_adopter = Sertifikat::create([
            'id_order' => $order->id,
            'id_user' => $user->id,
            'nama_pemilik' => $user->name,
            'nomor_surat' => $data__nomor_sertifikat->nomor_akhir + 1,
            'full_nomor_surat' => $data__nomor_sertifikat->nomor_akhir + 1 . '/' . $data__nomor_sertifikat->kerangka_penomoran,
            'tanggal_terbit' => now(),
        ]);

        $data__nomor_sertifikat->nomor_akhir += 1;
        $data__nomor_sertifikat->save();

        return response()->json([
            'message' => 'Order confirmed',
            'data' => $data_sertifikat_adopter,
        ], 200);
    }
}
