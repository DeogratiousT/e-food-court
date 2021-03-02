@extends('layouts.main')

@section('main-content')
    <div class="float-left">
        <h3>Dishes</h3>
    </div>
    <div class="float-right">
        <a href="{{ route('customers.orders.create',['customer'=>Auth::user()]) }}" class="btn btn-primary"><span><i class="mdi mdi-plus-circle"></i></span>&nbsp; Make Custom Order</a>
    </div>

    <div class="clearfix"></div><br>

    @if (count($availableDishes) > 0)
        <div class="card-columns">
            @foreach ($availableDishes as $dish)
                <div class="col mb-4">
                    <div class="card">
                    {{-- <div class="ribbon ribbon-top-left">
                        <span><b>{{ $post->category->name }}</b></span>
                    </div> --}}
                    <img src="{{ asset('storage') }}/cover images/{{ $dish->cover_image }}" class="card-img-top img-fluid rounded" style="height:220px">
                        <div class="card-body" style="min-height:115px">
                            <a href="{{ route('dishes.show',$dish) }}" class="card-title">{{ $dish->name }}</a>
                        </div>
                        <div class="card-footer">
                            {{-- <small class="text-muted"><i class="mdi mdi-calendar"></i> &nbsp; {{ Carbon\Carbon::parse($dish->updated_at)->isoFormat('Do MMM YYYY') }}</small> &nbsp; &nbsp; --}}
                            <small class="text-success"><i class="mdi mdi-currency-usd"></i>&nbsp;{{ $dish->cost }}</small> &nbsp; &nbsp;
                            <a href="{{ route('customers.orders.store',['customer'=>Auth::user()]) }}" class="btn btn-outline-primary" onclick="event.preventDefault();document.getElementById('make-order-form_{{ $dish->id }}').submit();">Order Dish</a>
                            <form id="make-order-form_{{ $dish->id }}" action="{{ route('customers.orders.store',['customer'=>Auth::user()]) }}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="customer_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="dish_id" value="{{ $dish->id }}">
                            </form>
                        </div>
                    </div>
                </div> 
            @endforeach      
        </div>
    @else 
        <p class="text-center">No Dishes</p>
    @endif
@endsection