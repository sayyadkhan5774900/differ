<div>
    <ul class="faq-list">
        @foreach ($noticeboards as $noticeboard)
        <li>
            <a data-toggle="collapse" href="#{{'faq2'.$loop->iteration}}" class="collapsed">{{$noticeboard->title}}<i
                    class="icofont-simple-up"></i></a>
            <div id="{{'faq2'.$loop->iteration}}" class="collapse {{ $loop->iteration == 1 ? 'show' : ''}}"
                data-parent=".faq-list">
                <p>
                    {!! date('d-M-y', strtotime($noticeboard->created_at)) !!}
                </p>
                <p>
                    {!!$noticeboard->body!!}
                </p>
                <div class="mb-3">
                    @if ($noticeboard->link_to == 'url')
                @if ($noticeboard->url)
                <div class="float-right">
                    <a href="{{$noticeboard->url}}">{{ trans('global.read_more') }}</a>
                </div>
                @endif
                @endif

                @if ($noticeboard->link_to == 'attachment')
                @if($noticeboard->attachment)
                <div class="float-right">
                    <a href=" {{ route('noticeboard.download', $noticeboard->id) }}" target="_blank">
                        {{ trans('global.downloadFile') }}
                    </a>
                </div>
                @endif
                @endif
                </div>
            </div>
        </li>
        @endforeach
    </ul>

    <div class="mt-2">
        {{$noticeboards->links()}}
    </div>
</div>
