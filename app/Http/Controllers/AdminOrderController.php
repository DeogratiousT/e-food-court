<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Dish;
use App\User;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {                
        $customOrders = Order::where('dish_id',null)->orderBy('created_at','DESC')->get();
        
        $orders = Order::where('custom_name',null)->orderBy('created_at','DESC')->get();

        return view('orders.dashboard',['orders'=>$orders, 'customOrders'=>$customOrders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.dashboard_edit',['order'=>$order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        
        $order->status = $request->status;

        if (isset($request->custom_cost)) {
            $request->validate([
                'custom_cost' => 'required',
            ]);

            $order->custom_cost = $request->custom_cost;
        }

        $order->save();

        return redirect()->route('orders.index')->with('success','Order State Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
