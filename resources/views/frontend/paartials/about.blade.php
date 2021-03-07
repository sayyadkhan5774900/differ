<section id="about" class="about">
    <div class="container">

      <div class="section-title" data-aos="zoom-out">
        <h2>About</h2>
        <p>Who we are</p>
      </div>

      <div class="row content" data-aos="fade-up">
        <div class="col-lg-6">
          <p>{!! $settings['about_description_first_column'] ?? '' !!}</p>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>{!! $settings['about_description_second_column'] ?? '' !!}</p>
          @if ($settings['about_button_link'] != null && $settings['about_button_name'] != '')
          <div class="float-right mt-2 pt-2">
            <a href={!! $settings['about_button_link'] ?? '' !!} class="btn-learn-more">{!! $settings['about_button_name'] ?? '' !!}</a>
          </div>              
          @endif
        </div>
      </div>

    </div>
</section>