<?php

namespace App\Http\Controllers\Lsm;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total_orders = Order::where('status_order', 'paid')->where('soft_delete', 0)->count();
        $total_revenue = Order::where('status_order', 'in process')->where('soft_delete', 0)->count();
        $data_orders = Order::with('user:id,name')->where('status_order', 'in process')->where('soft_delete', 0)->get();
        
        // return response()->json([
        //     'message' => 'LSM Dashboard data',
        //     'total_orders' => $total_orders,
        //     'total_revenue' => $total_revenue,
        //     'data_orders' => $data_orders,
        // ], 200);
        return view('lsm.dashboard', compact('total_orders', 'total_revenue', 'data_orders'));
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
