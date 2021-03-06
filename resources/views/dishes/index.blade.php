@extends('layouts.main')

@section('main-content')
    <div class="float-left">
        <h3>@isset($unavailable) Unavailable @endisset Dishes</h3>
    </div>
    <div class="float-right">
        @if (Auth::user()->inRole(['administrator']))
            @isset($unavailable)
                <a href="{{ route('dishes.index') }}" class="btn btn-primary">Available Dishes <span class="badge badge-light">{{ $availabledishes }}</span></a>
            @else
                <a href="{{ route('unavailable-dishes') }}" class="btn btn-primary">Unavailable Dishes <span class="badge badge-light">{{ $unavailabledishes }}</span></a>
            @endisset
        
            <a href="{{ route('dishes.create') }}" class="btn btn-primary"><span><i class="mdi mdi-plus-circle"></i></span>&nbsp; Add Dish</a>
        @else 
            <a href="{{ route('customers.orders.create',['customer'=>Auth::user()]) }}" class="btn btn-primary"><span><i class="mdi mdi-plus-circle"></i></span>&nbsp; Make Custom Order</a>
        @endif
    </div>

    <div class="clearfix"></div><br>

    @if (count($dishes) > 0)
        <div class="card-columns">
            @foreach ($dishes as $dish)
                <div class="col mb-4">
                    <div class="card">
                    {{-- <div class="ribbon ribbon-top-left">
                        <span><b>{{ $post->category->name }}</b></span>
                    </div> --}}
                    <img src="{{ asset('storage') }}/cover images/{{ $dish->cover_image }}" class="card-img-top img-fluid rounded" style="height:220px">
                        <div class="card-body" style="height:115px; overflow:auto">
                            <a href="{{ route('dishes.show',$dish) }}" class="card-title">{{ $dish->name }}</a>
                        </div>
                        <div class="card-footer">
                            {{-- <small class="text-muted"><i class="mdi mdi-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($dish->updated_at)->isoFormat('Do MMM YYYY') }}</small> &nbsp; &nbsp; --}}
                            <small class="text-success"><i class="mdi mdi-currency-usd"></i>&nbsp;{{ $dish->cost }}</small> &nbsp; &nbsp;
                            @if (Auth::user()->inRole(['administrator']))
                                <a href="{{ route('dishes.edit',$dish) }}" class="btn btn-primary">Edit Dish</a>
                            @else
                                <a href="{{ route('customers.orders.store',['customer'=>Auth::user()]) }}" class="btn btn-outline-primary" onclick="event.preventDefault();document.getElementById('make-order-form_{{ $dish->id }}').submit();">Order Dish</a>
                                <form id="make-order-form_{{ $dish->id }}" action="{{ route('customers.orders.store',['customer'=>Auth::user()]) }}" method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="customer_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="dish_id" value="{{ $dish->id }}">
                                </form>
                            @endif
                        </div>
                    </div>
                </div> 
            @endforeach      
        </div>
    @else 
        <p class="text-center">No Dishes</p>
    @endif
@endsection