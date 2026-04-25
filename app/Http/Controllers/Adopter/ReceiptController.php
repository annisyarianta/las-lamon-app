<?php

namespace App\Http\Controllers\Adopter;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ReceiptController extends Controller
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
        $data_order = Order::findOrFail(Crypt::decrypt($id));

        $data_user = $data_order->user;
        $data_receipt = $data_order->receipt;

        $data_order_items = $data_order->order_items()
            ->with([
                'catalogue:id,name,image_url',
                'product:id,name'
            ])
            ->get();

        $amount_in_words = strtoupper(
            trim($this->numberToWords($data_order->total_price)) . ' Rupiah'
        );

        // return view('adopter.receipt', compact(
        //     'data_receipt',
        //     'data_order',
        //     'data_user',
        //     'data_order_items',
        //     'amount_in_words'
        // ));

        $pdf = Pdf::loadView('adopter.receipt', [
            'data_receipt' => $data_receipt,
            'data_order' => $data_order,
            'data_user' => $data_user,
            'data_order_items' => $data_order_items,
            'amount_in_words' => $amount_in_words
        ])->setPaper('A4', 'landscape');
        return $pdf->stream('receipt.pdf');
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
