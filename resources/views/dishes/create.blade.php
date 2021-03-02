@extends('layouts.main')

@section('main-content')
<form action="{{ route('dishes.store') }}" method="POST" enctype="multipart/form-data">
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
        <label for="cost">Unit Cost</label>
        <input class="form-control {{ $errors->has('cost') ? ' is-invalid' : '' }}" type="number" id="cost" name="cost" value="{{ old('cost') }}" placeholder="Enter the Dish Unit Cost" required>
        @if ($errors->has('cost'))
            <span class="invalid-feedback" role="alert">
                {{ $errors->first('cost') }}
            </span>
        @endif
    </div>

    <div class="form-group">
        <label for="cover_image">Cover Image</label>
        <input class="form-control {{ $errors->has('cover_image') ? ' is-invalid' : '' }}" type="file" id="cover_image" name="cover_image">
        @if ($errors->has('cover_image'))
            <span class="invalid-feedback" role="alert">
                {{ $errors->first('cover_image') }}
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