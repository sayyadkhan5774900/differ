@extends('layouts.landing')

@section('content')

<main id="main">

    <!-- ======= Services Section ======= -->
    <section class="services mt-5">
        <div class="container">
            <div class="section-title" data-aos="zoom-out">
                <h2>Posts</h2>
                <p>Blog Post</p>
            </div>
            <div>
                <div class="h2 text-bold">{{$post->title}}</div>
                <div class="ml-1"><i class="text-primary">{{$post->excerpt}}</i></div>
                <hr>
                <div class=""><i>posted on &nbsp; {!! date('d-M-y', strtotime($post->created_at)) !!} </i></div>
                <hr>
                @if($post->featured_image)
                <img class="img-fluid rounded" src="{{ $post->featured_image->getUrl() }}" alt="test">
                <br>
                @endif
                <p class="mt-3 text-justify">{!! $post->page_text !!}</p>
            </div>
        </div>
    </section><!-- End Services Section -->

</main><!-- End #main -->

@endsection
@section('scripts')
@parent

@endsection
