<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class DishOrderFunctionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['unavailableDishes']);
    } 

    public function unavailableDishes()
    {
        $dishes = Dish::where('available',false)->orderBy('created_at','desc')->paginate(12);

        $availabledishes = Dish::where('available',true)->get()->count();

        $unavailabledishes = Dish::where('available',false)->get()->count();

        return view('dishes.index',['dishes'=>$dishes, 'unavailabledishes'=>$unavailabledishes, 'unavailable'=>true, 'availabledishes'=>$availabledishes]);
    }
}
