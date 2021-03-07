@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.instalment.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.instalments.update", [$instalment->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="student_id">{{ trans('cruds.instalment.fields.student') }}</label>
                            <select class="form-control select2" name="student_id" id="student_id" required>
                                @foreach($students as $id => $student)
                                    <option value="{{ $id }}" {{ (old('student_id') ? old('student_id') : $instalment->student->id ?? '') == $id ? 'selected' : '' }}>{{ $student }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('student'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('student') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.instalment.fields.student_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.instalment.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $instalment->title) }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.instalment.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="amount">{{ trans('cruds.instalment.fields.amount') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" value="{{ old('amount', $instalment->amount) }}" step="0.01" required>
                            @if($errors->has('amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.instalment.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payment_mehtod">{{ trans('cruds.instalment.fields.payment_mehtod') }}</label>
                            <input class="form-control" type="text" name="payment_mehtod" id="payment_mehtod" value="{{ old('payment_mehtod', $instalment->payment_mehtod) }}">
                            @if($errors->has('payment_mehtod'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_mehtod') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.instalment.fields.payment_mehtod_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payment">{{ trans('cruds.instalment.fields.payment') }}</label>
                            <input class="form-control" type="text" name="payment" id="payment" value="{{ old('payment', $instalment->payment) }}">
                            @if($errors->has('payment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.instalment.fields.payment_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payment_proof">{{ trans('cruds.instalment.fields.payment_proof') }}</label>
                            <div class="needsclick dropzone" id="payment_proof-dropzone">
                            </div>
                            @if($errors->has('payment_proof'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_proof') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.instalment.fields.payment_proof_helper') }}</span>
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
    Dropzone.options.paymentProofDropzone = {
    url: '{{ route('frontend.instalments.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 1000,
      height: 1200
    },
    success: function (file, response) {
      $('form').find('input[name="payment_proof"]').remove()
      $('form').append('<input type="hidden" name="payment_proof" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="payment_proof"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($instalment) && $instalment->payment_proof)
      var file = {!! json_encode($instalment->payment_proof) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="payment_proof" value="' + file.file_name + '">')
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