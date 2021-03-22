<section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" class="carousel carousel-fade" data-ride="carousel">

      @foreach ($sliders as $slider)
        <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}" style="background-image: url({{ $slider->background_iamge ? $slider->background_iamge->getUrl() : '' }});">
            <div class="carousel-container">
              <h2 class="animate__animated animate__fadeInDown">{!! $slider->title !!}</h2>
              <p class="animate__animated fanimate__adeInUp">{!! $slider->body_text !!}</p>
              @if ($slider->button_link != null && $slider->button_name != null)
              <a href="{{ $slider->button_link ? "$slider->button_link" : "" }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">{!! $slider->button_name !!}</a>
              @endif
            </div>
      </div>
      @endforeach

      <div class="container">
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
  
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section>
  