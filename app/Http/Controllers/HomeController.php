<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Dish;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin')->only('dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $customers = User::whereNotIn('id', [1])->orderBy('created_at','DESC')->get();
        
        $dishes = Dish::orderBy('created_at','DESC')->get();
        
        $customOrders = Order::where('dish_id',null)->orderBy('created_at','DESC')->get();
        
        $orders = Order::where('custom_name',null)->orderBy('created_at','DESC')->get();

        return view('dashboard',['orders'=>$orders, 'customOrders'=>$customOrders, 'dishes'=>$dishes, 'customers'=>$customers]);
    }
}
