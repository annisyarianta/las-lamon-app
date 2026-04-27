<?php

namespace App\Http\Controllers\Adopter;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

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
        $data_unpaid = $data->where('status_order', 'unpaid');
        $data_in_process = $data->where('status_order', 'in process');
        $data_paid = $data->where('status_order', 'paid');
        $data_canceled = $data->where('status_order', 'canceled');


        return view('adopter.myorder', compact('data_unpaid', 'data_in_process', 'data_paid', 'data_canceled'));
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

        if (isset($input['cart'])) {
            $data_order = Order::create([
                'id_user' => auth()->user()->id,
                'total_price' => $input['total_price'],
                'status_order' => 'unpaid',
                'order_date' => now(),
                'expired_at' => now()->addDays(1),
                'code' => 'ORD-' . date('Ymd') . '-' . strtoupper(Str::random(3)),
            ]);

            foreach ($input['cart'] as $cart) {

                $item = OrderItem::create([
                    'id_order' => $data_order->id,
                    'id_product' => $cart['id_product'] ?? null,
                    'id_catalogue' => $cart['id_catalogue'],
                    'quantity' => $cart['quantity'],
                    'unit_price' => $cart['unit_price'],
                    'total_price' => $cart['total_price'],
                ]);

                Cart::where('id', $cart['id_cart'])
                    ->update(['soft_delete' => 1]);
            }
        }

        $data_order_item = OrderItem::where('id_order', $data_order->id)
            ->with(['catalogue:id,name,image_url', 'product:id,name'])
            ->get();

        session(['checkout_data' => null]);
        // return response()->json([
        //     'message' => 'Order successfully created',
        //     'data_order' => $data_order,
        //     'data_order_item' => $data_order_item,
        // ], 201);

        return view('adopter.detail-unpaid', compact('data_order', 'data_order_item'))->with('success', 'Order created successfully. Please proceed with the payment.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Order::where('id_user', auth()->id())
            ->where('status_order', 'unpaid')
            ->where('expired_at', '<', now())
            ->update([
                'status_order' => 'canceled'
            ]);
        $data_order = Order::findOrFail(Crypt::decrypt($id));
        $data_order_item = OrderItem::where('id_order', $data_order->id)
            ->with(['catalogue:id,name,image_url', 'product:id,name'])
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
        $proof_payment_url = null;

        try {
            if ($request->hasFile('bukti_pembayaran')) {
                $fileSize = $request->file('bukti_pembayaran')->getSize(); // bytes

                if ($fileSize > 2 * 1024 * 1024) {
                    return back()->with('error', 'Maximum file size is 2MB.');
                }
            }

            $validated = $request->validate([
                'bukti_pembayaran' => [
                    'required',
                    'file',
                    'mimes:jpg,jpeg,png,pdf',
                    'max:2048',
                ],
            ], [
                'bukti_pembayaran.required' => 'Payment proof is required.',
                'bukti_pembayaran.file' => 'The uploaded file must be a valid file.',
                'bukti_pembayaran.mimes' => 'Payment proof must be JPG, JPEG, PNG, or PDF.',
                'bukti_pembayaran.max' => 'Maximum file size is 2MB.',
            ]);

            $data = Order::findOrFail(Crypt::decrypt($id));
            $nama = auth()->user()->name;

            if ($request->hasFile('bukti_pembayaran')) {
                $file = $request->file('bukti_pembayaran');

                $folder = "bukti_pembayaran/{$nama}/{$data->kode}";
                $pathFolder = public_path($folder);

                if (!file_exists($pathFolder)) {
                    mkdir($pathFolder, 0777, true);
                }

                $filename = time() . '_' . $file->getClientOriginalName();

                $file->move($pathFolder, $filename);

                $proof_payment_url = $folder . '/' . $filename;
            }

            $data->update([
                'proof_payment_url' => $proof_payment_url ?? $data->proof_payment_url,
                'status_order' => 'in process',
                'payment_date' => now(),
            ]);

            return redirect()
                ->route('adopter.order.index')
                ->with('success', 'Payment proof uploaded successfully, your order is now in process.');
        } catch (\Exception $e) {
            return back()->with('error', 'Upload failed. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
