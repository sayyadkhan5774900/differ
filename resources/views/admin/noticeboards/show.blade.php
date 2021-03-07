@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.noticeboard.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.noticeboards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.noticeboard.fields.id') }}
                        </th>
                        <td>
                            {{ $noticeboard->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticeboard.fields.title') }}
                        </th>
                        <td>
                            {{ $noticeboard->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticeboard.fields.body') }}
                        </th>
                        <td>
                            {!! $noticeboard->body !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticeboard.fields.link_to') }}
                        </th>
                        <td>
                            {{ App\Models\Noticeboard::LINK_TO_RADIO[$noticeboard->link_to] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticeboard.fields.url') }}
                        </th>
                        <td>
                            {{ $noticeboard->url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.noticeboard.fields.attachment') }}
                        </th>
                        <td>
                            @if($noticeboard->attachment)
                                <a href="{{ $noticeboard->attachment->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.noticeboards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection