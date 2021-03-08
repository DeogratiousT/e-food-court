@extends('layouts.main')

@section('main-content')
    <div class="float-left">
        <h3>My Orders</h3>
    </div>
    <div class="float-right">
        <a href="{{ route('customers.orders.create',['customer'=>Auth::user()]) }}" class="btn btn-primary"><span><i class="mdi mdi-plus-circle"></i></span>&nbsp; Make Custom Order</a>
    </div>

    <div class="clearfix"></div><br>

    <div class="table-responsive">
        @if (count($orders) > 0)
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Number</th>
                        <th scope="col">Dish</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Served For:</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)        
                        <tr>
                            <td>{{ $order->number }}</td>
                            <td>{{ (isset($order->dish_id) ? $order->dish->name : $order->custom_name) }}</td>
                            <td>{{ (isset($order->dish_id) ? $order->dish->cost : $order->custom_cost) }}</td>
                            <td>{{ (isset($order->destination) ? $order->destination : $order->customer->location) }}</td>
                            <th>{{ $order->number_of_packages }}</th>
                            <td>
                                @if ($order->status == "ordered")
                                    <span class="badge badge-secondary">{{ $order->status }}</span>
                                @endif
                                @if ($order->status == "processing")
                                    <span class="badge badge-info">{{ $order->status }}</span>
                                @endif
                                @if ($order->status == "dispatched")
                                    <span class="badge badge-primary">{{ $order->status }}</span>
                                @endif
                                @if ($order->status == "delivered")
                                    <span class="badge badge-success">{{ $order->status }}</span>
                                @endif
                            </td>
                            <th>{{ Carbon\Carbon::parse($order->created_at)->isoFormat('Do MMM  YYYY') }}</th>
                                @if ($order->status == "ordered" || $order->status == "processing")
                                    <td><a href="{{ route('orders.edit',$order) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit Order"><i class="mdi mdi-square-edit-outline"></i></a></td>
                                @endif
                        </tr>            
                    @endforeach 
                </tbody>
            </table>   
        @endif
    </div>

@endsection