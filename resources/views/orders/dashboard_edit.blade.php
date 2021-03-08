@extends('layouts.main')

@section('main-content')
<form action="{{ route('orders.update',['order'=>$order]) }}" method="POST">
    @csrf
    @method('PUT')

    <h3>Edit Order</h3> <br>

    <div class="form-group">
        <label for="destination">Delivery Location</label>
        <input class="form-control {{ $errors->has('destination') ? ' is-invalid' : '' }}" type="text" id="destination" name="destination" value="{{ isset($order->destination) ? $order->destination : $order->customer->location  }}" required>
        @if ($errors->has('destination'))
            <span class="invalid-feedback" role="alert">
                {{ $errors->first('destination') }}
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="number_of_packages">Number of Packages</label>
        <input class="form-control {{ $errors->has('number_of_packages') ? ' is-invalid' : '' }}" type="integer" id="number_of_packages" name="number_of_packages" value="{{ $order->number_of_packages }}" required>
        @if ($errors->has('number_of_packages'))
            <span class="invalid-feedback" role="alert">
                {{ $errors->first('number_of_packages') }}
            </span>
        @endif
    </div>

    <div class="form-group mb-0 text-center">
        <button class="btn btn-primary btn-block" type="submit">
            <i class="mdi mdi-content-save"></i> Submit
        </button>
    </div>
</form>
@endsection