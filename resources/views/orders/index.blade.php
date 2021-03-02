@extends('layouts.main')

@section('main-content')
<div class="float-left">
    <h3>My Orders</h3>
</div>
<div class="float-right">
    <a href="{{ route('customers.orders.create',['customer'=>Auth::user()]) }}" class="btn btn-primary"><span><i class="mdi mdi-plus-circle"></i></span>&nbsp; Make Custom Order</a>
</div>

<div class="clearfix"></div><br>

@if (count($orders) > 0)
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Number</th>
                <th scope="col">Dish</th>
                <th scope="col">Cost</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)        
                <tr>
                    <td>{{ $order->number }}</td>
                    <td>{{ (isset($order->dish_id)) ? $order->dish->name : $order->custom_name }}</td>
                    <td>{{ $order->cost }}</td>
                    <td>{{ $order->status }}</td>
                </tr>            
            @endforeach 
        </tbody>
    </table>   
@endif

@endsection