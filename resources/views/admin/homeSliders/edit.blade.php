@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.homeSlider.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.home-sliders.update", [$homeSlider->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.homeSlider.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $homeSlider->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.homeSlider.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="body_text">{{ trans('cruds.homeSlider.fields.body_text') }}</label>
                <input class="form-control {{ $errors->has('body_text') ? 'is-invalid' : '' }}" type="text" name="body_text" id="body_text" value="{{ old('body_text', $homeSlider->body_text) }}">
                @if($errors->has('body_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('body_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.homeSlider.fields.body_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_link">{{ trans('cruds.homeSlider.fields.button_link') }}</label>
                <input class="form-control {{ $errors->has('button_link') ? 'is-invalid' : '' }}" type="text" name="button_link" id="button_link" value="{{ old('button_link', $homeSlider->button_link) }}">
                @if($errors->has('button_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('button_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.homeSlider.fields.button_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_name">{{ trans('cruds.homeSlider.fields.button_name') }}</label>
                <input class="form-control {{ $errors->has('button_name') ? 'is-invalid' : '' }}" type="text" name="button_name" id="button_name" value="{{ old('button_name', $homeSlider->button_name) }}">
                @if($errors->has('button_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('button_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.homeSlider.fields.button_name_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection