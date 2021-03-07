@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.instalment.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.instalments.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.instalment.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $instalment->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.instalment.fields.student') }}
                                    </th>
                                    <td>
                                        {{ $instalment->student->first_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.instalment.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $instalment->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.instalment.fields.amount') }}
                                    </th>
                                    <td>
                                        {{ $instalment->amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.instalment.fields.payment_mehtod') }}
                                    </th>
                                    <td>
                                        {{ $instalment->payment_mehtod }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.instalment.fields.payment') }}
                                    </th>
                                    <td>
                                        {{ $instalment->payment }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.instalment.fields.payment_proof') }}
                                    </th>
                                    <td>
                                        @if($instalment->payment_proof)
                                            <a href="{{ $instalment->payment_proof->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $instalment->payment_proof->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.instalments.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection