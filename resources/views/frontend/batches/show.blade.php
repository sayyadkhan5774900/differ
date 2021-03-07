@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.batch.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.batches.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.batch.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $batch->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.batch.fields.degree') }}
                                    </th>
                                    <td>
                                        {{ $batch->degree->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.batch.fields.batch_code') }}
                                    </th>
                                    <td>
                                        {{ $batch->batch_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.batch.fields.batch_name') }}
                                    </th>
                                    <td>
                                        {{ $batch->batch_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.batch.fields.start_time') }}
                                    </th>
                                    <td>
                                        {{ $batch->start_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.batch.fields.end_time') }}
                                    </th>
                                    <td>
                                        {{ $batch->end_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.batch.fields.starting_date') }}
                                    </th>
                                    <td>
                                        {{ $batch->starting_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.batch.fields.ending_date') }}
                                    </th>
                                    <td>
                                        {{ $batch->ending_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.batch.fields.is_active') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Batch::IS_ACTIVE_SELECT[$batch->is_active] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.batches.index') }}">
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