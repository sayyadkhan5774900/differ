@extends('layouts.landing')

@section('content')

<main id="main">

    <!-- ======= Services Section ======= -->
    <section class="services mt-5">
        <div class="container">
            <div class="section-title" data-aos="zoom-out">
                <h2>blog</h2>
                <p>Blog Post</p>
            </div>
            <div>
                @livewire('frontend.posts')
            </div>
        </div>
    </section><!-- End Services Section -->

</main><!-- End #main -->

@endsection
@section('scripts')
@parent

@endsection
