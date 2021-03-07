<div class"faq">
    <div class="section-title" data-aos="zoom-out">
        <h2>F.A.Q</h2>
        <p>Frequently Asked Questions</p>
      </div>
  
      <ul class="faq-list">
        
        @foreach ($faqs as $faq)
        <li data-aos="fade-up" data-aos-delay="100">
            <a data-toggle="collapse" class="collapsed" href="#faq1{{$loop->iteration}}">{!! $faq->question !!}<i class="icofont-simple-up"></i></a>
            <div id="faq1{{$loop->iteration}}" class="collapse{{ $loop->iteration == 1 ? 'show' : '' }}" data-parent=".faq-list">
              <p>
                {!! $faq->answer !!}
            </p>
            </div>
          </li>  
        @endforeach

      </ul>  

      {{ $faqs->links() }}

</div>
