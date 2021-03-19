@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.homeSlider.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.home-sliders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.homeSlider.fields.id') }}
                        </th>
                        <td>
                            {{ $homeSlider->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homeSlider.fields.title') }}
                        </th>
                        <td>
                            {{ $homeSlider->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homeSlider.fields.body_text') }}
                        </th>
                        <td>
                            {{ $homeSlider->body_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homeSlider.fields.button_link') }}
                        </th>
                        <td>
                            {{ $homeSlider->button_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homeSlider.fields.button_name') }}
                        </th>
                        <td>
                            {{ $homeSlider->button_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.homeSlider.fields.background_iamge') }}
                        </th>
                        <td>
                            @if($homeSlider->background_iamge)
                                <a href="{{ $homeSlider->background_iamge->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $homeSlider->background_iamge->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.home-sliders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection