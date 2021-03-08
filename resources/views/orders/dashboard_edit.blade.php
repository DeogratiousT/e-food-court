@extends('layouts.main')

@section('main-content')
<form action="{{ route('orders.update',['order'=>$order]) }}" method="POST">
    @csrf
    @method('PUT')

    <h3>Edit Order</h3> <br>

    <div class="form-group">
        <label for="status">Status</label>
        <select class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" id="status" name="status">
            <option @if ($order->status == "ordered") selected @endif value="ordered">Ordered</option>
            <option @if ($order->status == "processing") selected @endif value="processing">Processing</option>
            <option @if ($order->status == "dispatched") selected @endif value="dispatched">Dispatched</option>
            <option @if ($order->status == "delivered") selected @endif value="delivered">Delivered</option>
        </select>
        @if ($errors->has('status'))
            <span class="invalid-feedback" role="alert">
                {{ $errors->first('status') }}
            </span>
        @endif
    </div>

    @if (!isset($order->dish->cost) && $order->custom_cost == null)
        <div class="form-group">
            <label for="custom_cost">Order Unit Cost</label>
            <input class="form-control {{ $errors->has('custom_cost') ? ' is-invalid' : '' }}" type="integer" id="custom_cost" name="custom_cost" value="{{ isset($order->dish->cost) ? $order->dish->cost : $order->custom_cost }}" required>
            @if ($errors->has('custom_cost'))
                <span class="invalid-feedback" role="alert">
                    {{ $errors->first('custom_cost') }}
                </span>
            @endif
        </div>
    @endif

    <div class="form-group mb-0 text-center">
        <button class="btn btn-primary btn-block" type="submit">
            <i class="mdi mdi-content-save"></i> Submit
        </button>
    </div>
</form>
@endsection