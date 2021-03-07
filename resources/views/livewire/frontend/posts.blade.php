<div>
    <div class="row">
        @forelse ($posts as $post)
        <div class="col-lg-6 mt-5">
            <div class="icon-box" data-aos="zoom-in-left">
                <h4 class="title"><a href="">{{$post->title}}</a></h4>
                <p class="description mb-2 font-italic">
                    {!! date('d-M-y', strtotime($post->created_at)) !!}
                </p>
                <p class="description">{{$post->excerpt}}</p>
                <div class="float-right mb-1">
                    <a href="post/{{$post->id}}">
                        {{ trans('global.view_more') }}
                    </a>
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
