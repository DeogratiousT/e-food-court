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
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati perspiciatis qui nihil maiores ab consequatur soluta, temporibus, accusantium aperiam voluptatibus cumque ad facilis quis! Quaerat architecto vitae, quod enim eos, beatae quidem ut similique libero deserunt consectetur exercitationem? Possimus culpa reiciendis rem amet neque voluptatem voluptas ipsa blanditiis dolorem doloremque a explicabo delectus, ullam veritatis magnam optio repellendus ex quae incidunt eaque repudiandae! Dolore ipsum asperiores accusamus veniam esse quo dolores eligendi voluptatibus. Asperiores, neque ducimus repudiandae corrupti natus atque.
            </div>
        </div>
    </section>
@endsection