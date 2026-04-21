<?php

namespace App\Http\Controllers\Adopter;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Katalog;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Order::where('id_user', auth()->id())
            ->where('status_order', 'unpaid')
            ->where('expired_at', '<', now())
            ->update([
                'status_order' => 'canceled'
            ]);

        $data = Order::where('id_user', auth()->user()->id)->where('soft_delete', 0)->get();
        $data_belum_lunas = $data->where('status_order', 'unpaid');
        $data_in_process = $data->where('status_order', 'in process');
        $data_lunas = $data->where('status_order', 'paid');
        $data_canceled = $data->where('status_order', 'canceled');

        return view('adopter.myorder', compact('data_belum_lunas', 'data_in_process', 'data_lunas', 'data_canceled'));
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
                'status_order' => 'unpaid',
                'tanggal_order' => now(),
                'expired_at' => now()->addDays(1),
                'kode' => 'ORD-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6)),
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
            ->with(['katalog:id,nama_katalog,url_gambar', 'produk:id,nama_produk'])
            ->get();

        session(['checkout_data' => null]);
        // return response()->json([
        //     'message' => 'Order successfully created',
        //     'data_order' => $data_order,
        //     'data_order_item' => $data_order_item,
        // ], 201);

        return view('adopter.detail-unpaid', compact('data_order', 'data_order_item'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data_order = Order::findOrFail(Crypt::decrypt($id));
        $data_order_item = OrderItem::where('id_order', $data_order->id)
            ->with(['katalog:id,nama_katalog,url_gambar', 'produk:id,nama_produk'])
            ->get();
        if ($data_order->status_order == 'unpaid' || $data_order->status_order == 'in process') {
            return view('adopter.detail-unpaid', compact('data_order', 'data_order_item'));
        } else if ($data_order->status_order == 'paid') {
            return view('adopter.detail-finished', compact('data_order', 'data_order_item'));
        } else if ($data_order->status_order == 'canceled') {
            return view('adopter.detail-canceled', compact('data_order', 'data_order_item'));
        }
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
        $data = Order::findOrFail(Crypt::decrypt($id));

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
            'status_order' => 'in process'
        ]);

        // return response()->json([
        //     'message' => 'bukti pembayaran already updated',
        //     'data' => $data
        // ], 200);

        return redirect()->route('adopter.order.index')->with('success', 'Payment proof uploaded successfully, your order is now in process.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
