@extends('layouts.landing')
@section('content')

    <!-- ======= About Section ======= -->
    @include('frontend.paartials.about')
    <!-- End About Section -->

    <!-- ======= Features Section ======= -->
    @include('frontend.paartials.features')
    <!-- End Features Section -->

    <!-- ======= Cta Section ======= -->
    @include('frontend.paartials.cta')
    <!-- End Cta Section -->
    
    <!-- ======= Noticeboard Section ======= -->
    @include('frontend.paartials.noticeboard')
    <!-- End Noticeboard Section -->

    <!-- ======= Blog Post Section ======= -->
    @include('frontend.paartials.services')
    <!-- End Blog Post Section -->

    <!-- ======= Portfolio Section ======= -->
    {{-- @include('frontend.paartials.portfolio') --}}
    <!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    @include('frontend.paartials.testimonials')
    <!-- End Testimonials Section -->

    <!-- ======= Pricing Section ======= -->
    {{-- @include('frontend.paartials.pricing') --}}
    <!-- End Pricing Section -->

    <!-- ======= F.A.Q Section ======= -->
    @include('frontend.paartials.faqs')
    <!-- End F.A.Q Section -->

    <!-- ======= Team Section ======= -->
    @include('frontend.paartials.team')
    <!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    @include('frontend.paartials.contact')
    <!-- End Contact Section -->


@endsection