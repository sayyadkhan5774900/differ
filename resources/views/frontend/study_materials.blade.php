@extends('layouts.landing')

@section('content')

<main id="main">

    <!-- ======= Services Section ======= -->
    <section class="services mt-5">
        <div class="container">
            <div class="section-title" data-aos="zoom-out">
                <h2>Notes</h2>
                <p>Study Materials</p>
            </div>
            <div>
                @foreach ($materials as $material)
                   <div class="mb-4 p-4 card">
                        <h3>{!! $material->title !!}</h3>
                        <p>{!! $material->description !!}</p>
                        @if($material->file)
                        <div class="float-right">
                        <a href=" {{ route('material.download', $material->id) }}" target="_blank">
                            {{ trans('global.downloadFile') }}
                        </a>
                        </div>
                        @endif
                   </div>
                @endforeach
                <div class="mt-4">
                    {{ $materials->links() }}
                </div>
            </div>
        </div>
    </section><!-- End Services Section -->



</main><!-- End #main -->

@endsection
@section('scripts')
@parent

@endsection
