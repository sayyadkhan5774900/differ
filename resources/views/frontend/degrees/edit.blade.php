@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.degree.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.degrees.update", [$degree->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.degree.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $degree->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.degree.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.degree.fields.description') }}</label>
                            <input class="form-control" type="text" name="description" id="description" value="{{ old('description', $degree->description) }}">
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.degree.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.degree.fields.type') }}</label>
                            <select class="form-control" name="type" id="type" required>
                                <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Degree::TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('type', $degree->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.degree.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="fee">{{ trans('cruds.degree.fields.fee') }}</label>
                            <input class="form-control" type="number" name="fee" id="fee" value="{{ old('fee', $degree->fee) }}" step="0.01">
                            @if($errors->has('fee'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fee') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.degree.fields.fee_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.degree.fields.fee_type') }}</label>
                            <select class="form-control" name="fee_type" id="fee_type" required>
                                <option value disabled {{ old('fee_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Degree::FEE_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('fee_type', $degree->fee_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('fee_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fee_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.degree.fields.fee_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="duration">{{ trans('cruds.degree.fields.duration') }}</label>
                            <input class="form-control" type="number" name="duration" id="duration" value="{{ old('duration', $degree->duration) }}" step="1">
                            @if($errors->has('duration'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('duration') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.degree.fields.duration_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="subjects">{{ trans('cruds.degree.fields.subjects') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="subjects[]" id="subjects" multiple>
                                @foreach($subjects as $id => $subjects)
                                    <option value="{{ $id }}" {{ (in_array($id, old('subjects', [])) || $degree->subjects->contains($id)) ? 'selected' : '' }}>{{ $subjects }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('subjects'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('subjects') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.degree.fields.subjects_helper') }}</span>
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