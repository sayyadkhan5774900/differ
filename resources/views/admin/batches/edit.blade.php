@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.batch.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.batches.update", [$batch->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="degree_id">{{ trans('cruds.batch.fields.degree') }}</label>
                <select class="form-control select2 {{ $errors->has('degree') ? 'is-invalid' : '' }}" name="degree_id" id="degree_id" required>
                    @foreach($degrees as $id => $degree)
                        <option value="{{ $id }}" {{ (old('degree_id') ? old('degree_id') : $batch->degree->id ?? '') == $id ? 'selected' : '' }}>{{ $degree }}</option>
                    @endforeach
                </select>
                @if($errors->has('degree'))
                    <div class="invalid-feedback">
                        {{ $errors->first('degree') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.degree_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="batch_code">{{ trans('cruds.batch.fields.batch_code') }}</label>
                <input class="form-control {{ $errors->has('batch_code') ? 'is-invalid' : '' }}" type="text" name="batch_code" id="batch_code" value="{{ old('batch_code', $batch->batch_code) }}" required>
                @if($errors->has('batch_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('batch_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.batch_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="batch_name">{{ trans('cruds.batch.fields.batch_name') }}</label>
                <input class="form-control {{ $errors->has('batch_name') ? 'is-invalid' : '' }}" type="text" name="batch_name" id="batch_name" value="{{ old('batch_name', $batch->batch_name) }}">
                @if($errors->has('batch_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('batch_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.batch_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_time">{{ trans('cruds.batch.fields.start_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="text" name="start_time" id="start_time" value="{{ old('start_time', $batch->start_time) }}">
                @if($errors->has('start_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.start_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_time">{{ trans('cruds.batch.fields.end_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('end_time') ? 'is-invalid' : '' }}" type="text" name="end_time" id="end_time" value="{{ old('end_time', $batch->end_time) }}">
                @if($errors->has('end_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.end_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="starting_date">{{ trans('cruds.batch.fields.starting_date') }}</label>
                <input class="form-control date {{ $errors->has('starting_date') ? 'is-invalid' : '' }}" type="text" name="starting_date" id="starting_date" value="{{ old('starting_date', $batch->starting_date) }}" required>
                @if($errors->has('starting_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('starting_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.starting_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ending_date">{{ trans('cruds.batch.fields.ending_date') }}</label>
                <input class="form-control date {{ $errors->has('ending_date') ? 'is-invalid' : '' }}" type="text" name="ending_date" id="ending_date" value="{{ old('ending_date', $batch->ending_date) }}" required>
                @if($errors->has('ending_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ending_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.ending_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.batch.fields.is_active') }}</label>
                <select class="form-control {{ $errors->has('is_active') ? 'is-invalid' : '' }}" name="is_active" id="is_active" required>
                    <option value disabled {{ old('is_active', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Batch::IS_ACTIVE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_active', $batch->is_active) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.batch.fields.is_active_helper') }}</span>
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