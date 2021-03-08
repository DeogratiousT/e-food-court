@extends('layouts.main')

@section('main-content')
<h3>Orders</h3>
    <nav>
        <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-orders-tab" data-toggle="tab" href="#nav-orders" role="tab" aria-controls="nav-orders" aria-selected="true">Orders <span class="badge badge-light">{{ count($orders) }}</span></a>
            <a class="nav-item nav-link" id="nav-custom-orders-tab" data-toggle="tab" href="#nav-custom-orders" role="tab" aria-controls="nav-custom-orders" aria-selected="false">Custom Orders<span class="badge badge-light">{{ count($customOrders) }}</span></a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-orders" role="tabpanel" aria-labelledby="nav-orders-tab">
            <br>
            @if (count($orders) > 0)
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Number</th>
                            <th scope="col">Dish</th>
                            <th scope="col">Total Cost</th>
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
                                <td>{{ $order->dish->name }}</td>
                                <td>{{ $order->dish->cost * $order->number_of_packages }}</td>
                                <td>{{ (isset($order->destination) ? $order->destination : $order->customer->location) }}</td>
                                <td>{{ $order->number_of_packages }}</td>
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
                                <td><a href="{{ route('orders.edit',['order'=>$order]) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit Order"><i class="mdi mdi-square-edit-outline"></i></a></td>
                                    
                            </tr>            
                        @endforeach 
                    </tbody>
                </table>
            @else
                <p>No Orders</p>
            @endif
        </div>
        <div class="tab-pane fade" id="nav-custom-orders" role="tabpanel" aria-labelledby="nav-custom-orders-tab">
            <br>
            @if (count($customOrders) > 0)
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Number</th>
                        <th scope="col">Dish</th>
                        <th scope="col">Total Cost</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Served For:</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customOrders as $order)        
                        <tr>
                            <td>{{ $order->number }}</td>
                            <td>{{ $order->custom_name }}</td>
                            <td>{{ $order->custom_cost * $order->number_of_packages }}</td>
                            <td>{{ (isset($order->destination) ? $order->destination : $order->customer->location) }}</td>
                            <td>{{ $order->number_of_packages }}</td>
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
                            <td><a href="{{ route('orders.edit',['order'=>$order]) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Edit Order"><i class="mdi mdi-square-edit-outline"></i></a></td>

                        </tr>            
                    @endforeach 
                </tbody>
            </table>
            @else
                <p>No Custom Orders</p>
            @endif
        </div>
    </div>
@endsection