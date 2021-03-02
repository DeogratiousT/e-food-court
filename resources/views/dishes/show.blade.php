@extends('layouts.main')

@section('main-content')
       
    <a href="{{ route('dishes.index') }}"><i class="mdi mdi-arrow-left"></i> back</a>

    <h3>{{$dish->name}}</h3>

    <img src="{{ asset('storage') }}/cover images/{{ $dish->cover_image }}" class="img-fluid rounded" style="height:300px"><br>

    <p>Cost :$ {{$dish->cost}}</p>

    <div class="container text-justify flex-wrap">
        <h4>Ingredients:</h4>
        {!!$dish->ingredients!!}
    </div>
    <hr>

    <p>Input The requested Details Below To Complete Order:</p>

    <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <label for="name">Dish Name</label>
            <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter the Dish Name" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="cost">Unit Cost</label>
            <input class="form-control {{ $errors->has('cost') ? ' is-invalid' : '' }}" type="number" id="cost" name="cost" value="{{ old('cost') }}" placeholder="Enter the Dish Unit Cost" required>
            @if ($errors->has('cost'))
                <span class="invalid-feedback" role="alert">
                    {{ $errors->first('cost') }}
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