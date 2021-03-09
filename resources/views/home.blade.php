@extends('layouts.app')

@section('content')
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">WELCOME TO E-FOOD COURT!</div>
            <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="{{ route('dishes.index') }}">EXPLORE OUR DISHES</a>
        </div>
    </header>
    <!-- Services-->
    <section class="page-section">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">ABOUT US</h2>
            </div>
            <div class="row text-justify">
                E-Food Court is an online prepared meal ordering platform that facilitates ordering and delivery of prepared meals to the consumers with the option of customizable menus items for customers to meals of their preference. It offers extra food components and ingredients options that the customers may have preference to over the ones provided on the menus. This system gives the solutions for most problems in current queuing system and traditional food ordering systems that necessitates the physical appearance at food courts and restaurants.  The systems also provides functionalities where the takeaway visitor’s lists can be increased with a dynamic system. The E-Food Court manages online meal cuisines which can be easily selected by the consumer. The consumers can place orders for meals which are not listed by specifying the constituents of the meal and the amount they prefer. The users of this system can easily track their order and make secure payments. The systems ensures information confidentiality of the users in the encrypted database.
            </div>
        </div>
    </section>
@endsection