@isset($testimonials)
<section id="testimonials" class="testimonials">
  <div class="container">

    <div class="section-title" data-aos="zoom-out">
      <h2>Testimonials</h2>
      <p>What they are saying about us</p>
    </div>

    <div class="owl-carousel testimonials-carousel" data-aos="fade-up">

      @foreach ($testimonials as $testimonial)
      <div class="testimonial-item">
        <p>
          <i class="bx bxs-quote-alt-left quote-icon-left"></i>
            {!! $testimonial->sying_text !!}
          <i class="bx bxs-quote-alt-right quote-icon-right"></i>
        </p>
        <div class="testimonial-person">
          @if ($testimonial->image)
          <img src="{{ $testimonial->image->getUrl() }}" class="testimonial-img" alt="">
          @endif
          <h3>{{ $testimonial->name }}</h3>
          <h4>{{ $testimonial->position }}</h4>
        </div>
      </div>
      @endforeach

    </div>

  </div>
</section>
@endisset