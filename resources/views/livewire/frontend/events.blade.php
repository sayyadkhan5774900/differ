<div>
    <div class="row">
        @forelse ($posts as $post)
        <div class="col-lg-6 mt-5">
            <div class="icon-box" data-aos="zoom-in-left">
               <div class="row">
                @if($post->featured_image)
                <div class="col-4">
                    <a href="post/{{$post->id}}">
                        <img class="img-fluid rounded" src="{{ $post->featured_image->getUrl() }}" alt="test">
                    </a>
                </div>
                @endif

                <div class="col-8">
                    <h4 class="title"><a href="post/{{$post->id}}">{{$post->title}}</a></h4>
                    <p class="description mb-2 font-italic">
                        {!! date('d-M-y', strtotime($post->created_at)) !!}
                    </p>
                    <p class="description">{{$post->excerpt}}</p>
                </div>

               </div>
            </div>
        </div>
        @empty
        @endforelse
    </div>

    <div class="mt-2">
        {{$posts->links()}}
    </div>
</div>

