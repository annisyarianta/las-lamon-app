<?php

namespace App\Http\Controllers\Lsm;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\NumberCertificate;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Receipt;
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
        $data = Order::with('user:id,name')->where('soft_delete', 0)->get();

        $data_unpaid = $data->where('status_order', 'unpaid');
        $data_in_process = $data->where('status_order', 'in process');
        $data_paid = $data->where('status_order', 'paid');
        $data_canceled = $data->where('status_order', 'canceled');

        // return view('lsm.order.index', compact('data'));
        return view('lsm.dataorder', compact('data_unpaid', 'data_in_process', 'data_paid', 'data_canceled'));
        // return response()->json([
        //     'message' => 'List of orders',
        //     'data' => $data,
        //     'data' => $data_unpaid,
        //     'data' =>
        // ], 200);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $data_order = Order::findOrFail(Crypt::decrypt($id));

        $data_user = $data_order->user->name;
        $data_order_item = OrderItem::where('id_order', $data_order->id)
            ->with(['catalogue:id,name,image_url', 'product:id,name'])
            ->get();

        return view('lsm.detail-neworder', compact('data_order', 'data_order_item', 'data_user'));
        // return response()->json([
        //     'message' => 'Order details',
        //     'data' => $data_order,
        //     'items' => $data_order_item,
        //     'user' =>$data_user
        // ], 200);
    }


    public function confirmOrder(string $id, Request $request)
    {
        $input = $request->all();
        $order = Order::findOrFail(Crypt::decrypt($id));

        if ($input['action'] == 'approve') {

            $user = $order->user;

            $order->update(['status_order' => 'paid']);

            $order_items = $order->order_items->where('soft_delete', 0);

            $data_number_certificate = NumberCertificate::where('soft_delete', 0)->first();

            $data_certificate = [];

            foreach ($order_items as $each_data) {

                $each_data->update([
                    'id_location' => 1
                ]);

                $data_certificate_adopter = Certificate::create([
                    'id_order' => $order->id,
                    'id_order_item' => $each_data->id,
                    'id_user' => $user->id,
                    'owner_name' => $user->name,
                    'number_ceritificate' => ($data_number_certificate->last_number + 1),
                ]);

                $data_certificate[] = $data_certificate_adopter;

                $data_number_certificate->last_number += 1;
                $data_number_certificate->save();
            }

            $data_receipt = Receipt::create([
                'id_user' => $user->id,
                'id_order' => $order->id,
                'code' => 'KW-' . date('Ymd') . '-' . strtoupper(Str::random(3)),
            ]);
        } else if ($input['action'] == 'decline') {
            $order->update(['status_order' => 'canceled']);
        }

        return redirect()->route('lsm.order.index')->with('success', 'Order has been ' . ($input['action'] == 'approve' ? 'approved' : 'declined') . ' successfully.');
    }
}
