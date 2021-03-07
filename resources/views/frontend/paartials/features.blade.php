<section id="services" class="features">
  <div class="container">

    <div class="section-title" data-aos="zoom-out">
      <h2>Degrees</h2>
      <p>What We Offer</p>
    </div>


    <ul class="nav nav-tabs row d-flex">
     @foreach ($services as $service)
     <li class="nav-item col-3 mt-2" data-aos="zoom-in">
      <a class="nav-link {{ $loop->iteration == 1 ? 'active  show' : '' }}" data-toggle="tab" href="#tab-{{ $loop->iteration }}">
        <h4 class="">{!! $service->name !!}</h4>
      </a>
    </li>
     @endforeach
    </ul>

    <div class="tab-content" data-aos="fade-up">
      @foreach ($services as $service)
      <div class="tab-pane {{ $loop->iteration == 1 ? 'active  show' : '' }}" id="tab-{{ $loop->iteration }}">
        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
            <h3>{!! $service->title !!}</h3>
            <p class="font-italic">
              {!! $service->excerpt !!}
            </p>
            <p>
              {!! $service->description !!}
            </p>
          </div>
          @if ($service->image)
          <div class="col-lg-6 order-1 order-lg-2 text-center">
            <img src="{{ $service->image->getUrl() }}" alt="" class="img-fluid">
          </div>
          @endif
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section>

