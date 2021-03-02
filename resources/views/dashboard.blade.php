@extends('layouts.main')

@section('main-content')
<h3>Admin DashBoard</h3>
    <nav>
        <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-customers-tab" data-toggle="tab" href="#nav-customers" role="tab" aria-controls="nav-customers" aria-selected="true">Customers<span class="badge badge-light">{{ count($customers) }}</span></a>
        <a class="nav-item nav-link" id="nav-dishes-tab" data-toggle="tab" href="#nav-dishes" role="tab" aria-controls="nav-dishes" aria-selected="false">Dishes<span class="badge badge-light">{{ count($dishes) }}</span></a>
        <a class="nav-item nav-link" id="nav-orders-tab" data-toggle="tab" href="#nav-orders" role="tab" aria-controls="nav-orders" aria-selected="false">Orders <span class="badge badge-light">{{ count($orders) }}</span></a>
        <a class="nav-item nav-link" id="nav-custom-orders-tab" data-toggle="tab" href="#nav-custom-orders" role="tab" aria-controls="nav-custom-orders" aria-selected="false">Custom Orders<span class="badge badge-light">{{ count($customOrders) }}</span></a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-customers" role="tabpanel" aria-labelledby="nav-customers-tab">
            <br>
            @if (count($customers) > 0)
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)        
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                            </tr>            
                        @endforeach
                        {{-- {{ $customer->links() }}  --}}
                    </tbody>
                </table>
            @else
                <p>No Customers</p>
            @endif
        </div>
        <div class="tab-pane fade" id="nav-dishes" role="tabpanel" aria-labelledby="nav-dishes-tab">
            <br>
            @if (count($dishes) > 0)
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dishes as $dish)        
                            <tr>
                                <td>{{ $dish->name }}</td>
                                <td>{{ $dish->cost }}</td>
                            </tr>            
                        @endforeach
                        {{-- {{ $dishes->links() }}  --}}
                    </tbody>
                </table>
            @else
                <p>No Dishes</p>
            @endif
        </div>
        <div class="tab-pane fade" id="nav-orders" role="tabpanel" aria-labelledby="nav-orders-tab">
            <br>
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
                                <td>{{ $order->dish->name }}</td>
                                <td>{{ $order->cost }}</td>
                                <td>{{ $order->status }}</td>
                            </tr>            
                        @endforeach
                        {{-- {{ $orders->links() }}  --}}
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
                            <th scope="col">Name</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customOrders as $order)        
                            <tr>
                                <td>{{ $order->number }}</td>
                                <td>{{ $order->custom_name }}</td>
                                <td>{{ $order->cost }}</td>
                                <td>{{ $order->status }}</td>
                            </tr>            
                        @endforeach
                        {{-- {{ $customOrders->links() }}  --}}
                    </tbody>
                </table>
            @else
                <p>No Custom Orders</p>
            @endif
        </div>
    </div>
@endsection