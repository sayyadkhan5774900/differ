@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.teamMemeber.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.team-memebers.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="image">{{ trans('cruds.teamMemeber.fields.image') }}</label>
                            <div class="needsclick dropzone" id="image-dropzone">
                            </div>
                            @if($errors->has('image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.teamMemeber.fields.image_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.teamMemeber.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.teamMemeber.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="position">{{ trans('cruds.teamMemeber.fields.position') }}</label>
                            <input class="form-control" type="text" name="position" id="position" value="{{ old('position', '') }}">
                            @if($errors->has('position'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('position') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.teamMemeber.fields.position_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="twitter_link">{{ trans('cruds.teamMemeber.fields.twitter_link') }}</label>
                            <input class="form-control" type="text" name="twitter_link" id="twitter_link" value="{{ old('twitter_link', '') }}">
                            @if($errors->has('twitter_link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('twitter_link') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.teamMemeber.fields.twitter_link_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="facebook_link">{{ trans('cruds.teamMemeber.fields.facebook_link') }}</label>
                            <input class="form-control" type="text" name="facebook_link" id="facebook_link" value="{{ old('facebook_link', '') }}">
                            @if($errors->has('facebook_link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('facebook_link') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.teamMemeber.fields.facebook_link_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="instagram_link">{{ trans('cruds.teamMemeber.fields.instagram_link') }}</label>
                            <input class="form-control" type="text" name="instagram_link" id="instagram_link" value="{{ old('instagram_link', '') }}">
                            @if($errors->has('instagram_link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('instagram_link') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.teamMemeber.fields.instagram_link_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="linkedin_link">{{ trans('cruds.teamMemeber.fields.linkedin_link') }}</label>
                            <input class="form-control" type="text" name="linkedin_link" id="linkedin_link" value="{{ old('linkedin_link', '') }}">
                            @if($errors->has('linkedin_link'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('linkedin_link') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.teamMemeber.fields.linkedin_link_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('frontend.team-memebers.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($teamMemeber) && $teamMemeber->image)
      var file = {!! json_encode($teamMemeber->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
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