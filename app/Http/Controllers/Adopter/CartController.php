<?php

namespace App\Http\Controllers\Adopter;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Cart::with([
            'product:id,name',
            'catalogue:id,name'
        ])
            ->where('soft_delete', 0)
            ->get();

        // return response()->json([
        //     'message' => 'List of cart items',
        //     'data' => $data,
        // ], 200);

        return view('adopter.cart', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $cart = Cart::create([
            'id_user' => auth()->id(),
            'id_product' => $input['id_product'] ?? null,
            'id_catalogue' => $input['id_catalogue'],
            'quantity' => $input['quantity'],
            'unit_price' => $input['unit_price'],
            'total_price' => $input['quantity'] * $input['unit_price'],
        ]);
        return redirect()->route('adopter.cart.index')->with('success', 'Item added to cart successfully.');
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
        $cart = Cart::findOrFail($id);

        $cart->update([
            'quantity' => $request->qty,
            'total_price' => $request->qty * $cart->unit_price
        ]);

        return response()->json([
            'message' => 'Quantity updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = Cart::findOrFail(Crypt::decrypt($id));
        $cart->soft_delete = 1;
        $cart->save();

        return redirect()->route('adopter.cart.index')->with('success', 'Item removed from cart successfully.');
    }
}
