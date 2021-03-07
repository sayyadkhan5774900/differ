<div>
    <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Team</h2>
          <p>Our Hardworking Team</p>
        </div>
    
        <div class="row">
    
            @foreach ($teamMembers as $member)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up">
                    <div class="member-img">
                        @if ($member->image)
                        <img src="{{ $member->image->getUrl() }}" class="img-fluid" alt="">
                        @endif
                        <div class="social">
                        <a href="{{ $member->twitter_link ? "$member->twitter_link" : "" }}" target="_blank"><i class="icofont-twitter"></i></a>
                        <a href="{{ $member->facebook_link ? "$member->facebook_link" : "" }}" target="_blank"><i class="icofont-facebook"></i></a>
                        <a href="{{ $member->instagram_link ? "$member->instagram_link" : "" }}" target="_blank"><i class="icofont-instagram"></i></a>
                        <a href="{{ $member->linkedin_link ? "$member->linkedin_link" : "" }}" target="_blank"><i class="icofont-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>{!! $member->name !!}</h4>
                        <span>{!! $member->position !!}</span>
                    </div>
                    </div>
                </div>
            @endforeach
    
        </div>

        {{ $teamMembers->links() }}

    
      </div>
</div>