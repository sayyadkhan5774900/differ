<section id="contact" class="contact">
  <div class="container">

    <div class="section-title" data-aos="zoom-out">
      <h2>Contact</h2>
      <p>Contact Us</p>
    </div>

    <div class="row mt-5">

      <div class="col-lg-4" data-aos="fade-right">
        <div class="info">
          <div class="address">
            <i class="icofont-google-map"></i>
            <h4>Location:</h4>
            <p>{!! $settings['contact_address'] !!}</p>
          </div>

          <div class="email">
            <i class="icofont-envelope"></i>
            <h4>Email:</h4>
            <p><a href="mailto:{!! $settings['contact_email'] ?? '' !!}">{!! $settings['contact_email'] ?? '' !!}</a></p>
          </div>

          <div class="phone">
            <i class="icofont-phone"></i>
            <h4>Phone:</h4>
            <p><a href="tel:{!! str_replace(' ', '', $settings['contact_phone'] ?? '') !!}">{!! $settings['contact_phone'] ?? '' !!}</a></p>
          </div>

          <div class="phone">
            <i class="icofont-phone"></i>
            <h4>Mobile:</h4>
            <p><a href="tel:{!! str_replace(' ', '', $settings['contact_mobile'] ?? '') !!}">{!! $settings['contact_phone'] ?? '' !!}</a></p>
          </div>

        </div>

      </div>

      <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            <div class="col-md-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
            <div class="validate"></div>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
            <div class="validate"></div>
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>

      </div>

    </div>

  </div>
</section>
