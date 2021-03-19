@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.homeSlider.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.home-sliders.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.homeSlider.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.homeSlider.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="body_text">{{ trans('cruds.homeSlider.fields.body_text') }}</label>
                <input class="form-control {{ $errors->has('body_text') ? 'is-invalid' : '' }}" type="text" name="body_text" id="body_text" value="{{ old('body_text', '') }}">
                @if($errors->has('body_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('body_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.homeSlider.fields.body_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_link">{{ trans('cruds.homeSlider.fields.button_link') }}</label>
                <input class="form-control {{ $errors->has('button_link') ? 'is-invalid' : '' }}" type="text" name="button_link" id="button_link" value="{{ old('button_link', '') }}">
                @if($errors->has('button_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('button_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.homeSlider.fields.button_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_name">{{ trans('cruds.homeSlider.fields.button_name') }}</label>
                <input class="form-control {{ $errors->has('button_name') ? 'is-invalid' : '' }}" type="text" name="button_name" id="button_name" value="{{ old('button_name', '') }}">
                @if($errors->has('button_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('button_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.homeSlider.fields.button_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="background_iamge">{{ trans('cruds.homeSlider.fields.background_iamge') }}</label>
                <div class="needsclick dropzone {{ $errors->has('background_iamge') ? 'is-invalid' : '' }}" id="background_iamge-dropzone">
                </div>
                @if($errors->has('background_iamge'))
                    <div class="invalid-feedback">
                        {{ $errors->first('background_iamge') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.homeSlider.fields.background_iamge_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.backgroundIamgeDropzone = {
    url: '{{ route('admin.home-sliders.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="background_iamge"]').remove()
      $('form').append('<input type="hidden" name="background_iamge" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="background_iamge"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($homeSlider) && $homeSlider->background_iamge)
      var file = {!! json_encode($homeSlider->background_iamge) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="background_iamge" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection