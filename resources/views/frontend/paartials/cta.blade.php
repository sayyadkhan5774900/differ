<section id="cta" class="cta">
  <div class="container">

    <div class="row" data-aos="zoom-out">
      <div class="col-lg-9 text-center text-lg-left">
        <h3>{!! $settings['call_to_action_title'] ?? '' !!}</h3>
        <p>{!! $settings['call_to_action_description'] ?? '' !!}</p>
      </div>
      @if ($settings['call_to_action_button_link'])          
      <div class="col-lg-3 cta-btn-container text-center">
        <a class="cta-btn align-middle" href="{!! $settings['call_to_action_button_link'] ?? '' !!}">{!! $settings['call_to_action_button_name'] ?? '' !!}</a>
      </div>
      @endif
    </div>

  </div>
</section>