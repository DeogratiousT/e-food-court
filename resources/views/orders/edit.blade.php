@extends('layouts.main')

@section('main-content')
<form action="{{ route('customers.orders.update',['customer'=>$user,'order'=>$order]) }}" method="POST">
    @csrf
    @method('PUT')

    <h3>Edit Order</h3> <br>

    @isset($order->dish)
        <div class="form-group">
            <label for="custom_name">Dish Custom Name</label>
            <input class="form-control {{ $errors->has('custom_name') ? ' is-invalid' : '' }}" type="text" id="custom_name" name="custom_name" value="{{ $order->custom_name }}" required>
            @if ($errors->has('custom_name'))
                <span class="invalid-feedback" role="alert">
                    {{ $errors->first('custom_name') }}
                </span>
            @endif
        </div>
    @else 
        <div class="form-group">
            <label for="custom_name">Dish Custom Name</label>
            <input class="form-control {{ $errors->has('custom_name') ? ' is-invalid' : '' }}" type="text" id="custom_name" name="custom_name" value="{{ $order->custom_name }}" required>
            @if ($errors->has('custom_name'))
                <span class="invalid-feedback" role="alert">
                    {{ $errors->first('custom_name') }}
                </span>
            @endif
        </div>
    @endisset

    <div class="form-group">
        <label for="ingredients">Ingredients</label>
        <textarea class="form-control {{ $errors->has('ingredients') ? ' is-invalid' : '' }}" id="ingredients" name="ingredients" placeholder="Post Body">{{ old('ingredients') }}</textarea>
        @if ($errors->has('ingredients'))
            <span class="invalid-feedback" role="alert">
                {{ $errors->first('ingredients') }}
            </span>
        @endif

        <script src="{{ asset('ckeditor/ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'ingredients' );
        </script>

    </div>

    <div class="form-group">
        <label for="destination">Delivery Location</label>
        <input class="form-control {{ $errors->has('destination') ? ' is-invalid' : '' }}" type="text" id="destination" name="destination" value="{{ old('destination') }}" placeholder="Enter the Delivery Destination" required>
        @if ($errors->has('destination'))
            <span class="invalid-feedback" role="alert">
                {{ $errors->first('destination') }}
            </span>
        @endif
    </div>
    
    <input type="hidden" name="customer_id" value="{{ $user->id }}">

    <div class="form-group mb-0 text-center">
        <button class="btn btn-primary btn-block" type="submit">
            <i class="mdi mdi-content-save"></i> Submit
        </button>
    </div>
</form>
@endsection