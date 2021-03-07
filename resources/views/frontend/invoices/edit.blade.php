@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.invoice.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.invoices.update", [$invoice->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="student_id">{{ trans('cruds.invoice.fields.student') }}</label>
                            <select class="form-control select2" name="student_id" id="student_id" required>
                                @foreach($students as $id => $student)
                                    <option value="{{ $id }}" {{ (old('student_id') ? old('student_id') : $invoice->student->id ?? '') == $id ? 'selected' : '' }}>{{ $student }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('student'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('student') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.student_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.invoice.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $invoice->title) }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="amount_payable">{{ trans('cruds.invoice.fields.amount_payable') }}</label>
                            <input class="form-control" type="number" name="amount_payable" id="amount_payable" value="{{ old('amount_payable', $invoice->amount_payable) }}" step="0.01" required>
                            @if($errors->has('amount_payable'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount_payable') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.invoice.fields.amount_payable_helper') }}</span>
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