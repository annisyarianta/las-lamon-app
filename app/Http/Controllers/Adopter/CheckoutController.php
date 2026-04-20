<?php

namespace App\Http\Controllers\Adopter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = session('checkout_data');
        if (!$data) {
            return redirect()->route('adopter.cart.index')->with('error', 'Cart kosong');
        }
        // dd($checkout_data);
        return view('adopter.checkout', compact('data'));
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

        $data = json_decode($request->data);

        session(['checkout_data' => $data]);
        if (empty($data->cart_item)) {
            return redirect()->route('adopter.cart.index')->with('error', 'Your Cart Is Empty');
        }

        return redirect()->route('adopter.checkout.index');
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
