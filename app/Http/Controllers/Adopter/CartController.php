<?php

namespace App\Http\Controllers\Adopter;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Cart::where('id_user', auth()->id())->first();

        $data = $cart?->cart_items()
            ->with([
                'produk:id,nama_produk',
                'katalog:id,nama_katalog'
            ])
            ->where('soft_delete', 0)
            ->get();
        // return response()->json([
        //     'message' => 'List of cart items',
        //     'data' => $data,
        // ], 200);

        return view('cart', compact('data'));
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
        $cart_item = CartItem::findOrFail(Crypt::decrypt($id));
        $cart_item->soft_delete = 1;
        $cart_item->save();

        return redirect()->route('adopter.cart.index')->with('success', 'Item removed from cart successfully.');
    }
}
