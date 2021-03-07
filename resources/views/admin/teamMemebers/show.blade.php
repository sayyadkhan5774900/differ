@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.teamMemeber.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.team-memebers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.teamMemeber.fields.id') }}
                        </th>
                        <td>
                            {{ $teamMemeber->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamMemeber.fields.image') }}
                        </th>
                        <td>
                            @if($teamMemeber->image)
                                <a href="{{ $teamMemeber->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $teamMemeber->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamMemeber.fields.name') }}
                        </th>
                        <td>
                            {{ $teamMemeber->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamMemeber.fields.position') }}
                        </th>
                        <td>
                            {{ $teamMemeber->position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamMemeber.fields.twitter_link') }}
                        </th>
                        <td>
                            {{ $teamMemeber->twitter_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamMemeber.fields.facebook_link') }}
                        </th>
                        <td>
                            {{ $teamMemeber->facebook_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamMemeber.fields.instagram_link') }}
                        </th>
                        <td>
                            {{ $teamMemeber->instagram_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamMemeber.fields.linkedin_link') }}
                        </th>
                        <td>
                            {{ $teamMemeber->linkedin_link }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.team-memebers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection