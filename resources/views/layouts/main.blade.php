@extends('layouts.app')

@section('content')
    <section class="page-section">
        <div class="container">
            <div class="text-center">
                @include('includes.messages')
                <h2 class="section-heading text-uppercase">
                    @yield('title')
                </h2>
            </div>

            @yield('main-content')
            
        </div>
    </section>
@endsection