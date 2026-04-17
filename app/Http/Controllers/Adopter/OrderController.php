<?php

namespace App\Http\Controllers\Adopter;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Order::where('id_user', auth()->user()->id)->where('soft_delete', 0)->get();
        $data_belum_lunas = $data->where('status_order', 'belum_lunas');
        $data_diproses = $data->where('status_order', 'diproses');
        $data_lunas = $data->where('status_order', 'lunas');

        // return view('adopter.order.index', compact('data_belum_lunas', 'data_diproses', 'data_lunas'));
        return response()->json([
            'message' => 'List of orders',
            'data_belum_lunas' => $data_belum_lunas,
            'data_diproses' => $data_diproses,
            'data_lunas' => $data_lunas,
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
        $input = json_decode($request->data, true);
       
        if (isset($input['cart_item'])) {
            $data_order = Order::create([
                'id_user' => auth()->user()->id,
                'total_harga' => $input['total_harga'] + 1500,
                'status_order' => 'belum_lunas',
                'tanggal_order' => now(),
                'expired_at' => now()->addDays(1),
                'kode' => strtoupper(uniqid()),
            ]);

            foreach ($input['cart_item'] as $cart_item) {

                $item = OrderItem::create([
                    'id_order' => $data_order->id,
                    'id_produk' => $cart_item['id_produk'] ?? null,
                    'id_katalog' => $cart_item['id_katalog'],
                    'kuantitas' => $cart_item['kuantitas'],
                    'harga_satuan' => $cart_item['harga_satuan'],
                    'harga_total' => $cart_item['harga_total'],
                ]);

                CartItem::where('id', $cart_item['id_cart'])
                    ->update(['soft_delete' => 1]);
            }
        }

        $data_order_item = OrderItem::where('id_order', $data_order->id)
            ->with(['katalog:id,nama_katalog', 'produk:id,nama_produk'])
            ->get();

        session(['checkout_data' => null]);
        return response()->json([
            'message' => 'Order successfully created',
            'data_order' => $data_order,
            'data_order_item' => $data_order_item,
        ], 201);

        // return view('checkout', compact('data_order', 'data_order_item'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

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
        $data = Order::findOrFail($id);
        $nama = str_replace(' ', '_', auth()->user()->name);
        $url_bukti_pembayaran = null;

        $validated = $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);


        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');

            $folder = "bukti_pembayaran/{$nama}/$data->kode";
            $pathFolder = public_path($folder);

            if (!file_exists($pathFolder)) {
                mkdir($pathFolder, 0777, true);
            }

            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move($pathFolder, $filename);

            $url_bukti_pembayaran = asset($folder . '/' . $filename);
        }

        $data->update([
            'url_bukti_pembayaran' => $url_bukti_pembayaran ?? $data->url_bukti_pembayaran,
            'status_order' => 'diproses'
        ]);

        return response()->json([
            'message' => 'bukti pembayaran already updated',
            'data' => $data
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
