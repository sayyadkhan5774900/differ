@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.feeType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.fee-types.update", [$feeType->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.feeType.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $feeType->title) }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feeType.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fee">{{ trans('cruds.feeType.fields.fee') }}</label>
                <input class="form-control {{ $errors->has('fee') ? 'is-invalid' : '' }}" type="number" name="fee" id="fee" value="{{ old('fee', $feeType->fee) }}" step="0.01" required>
                @if($errors->has('fee'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fee') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feeType.fields.fee_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.feeType.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\FeeType::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $feeType->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feeType.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="no_of_months">{{ trans('cruds.feeType.fields.no_of_months') }}</label>
                <input class="form-control {{ $errors->has('no_of_months') ? 'is-invalid' : '' }}" type="number" name="no_of_months" id="no_of_months" value="{{ old('no_of_months', $feeType->no_of_months) }}" step="1">
                @if($errors->has('no_of_months'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_of_months') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feeType.fields.no_of_months_helper') }}</span>
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