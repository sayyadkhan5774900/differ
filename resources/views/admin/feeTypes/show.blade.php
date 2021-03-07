@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.feeType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fee-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.feeType.fields.id') }}
                        </th>
                        <td>
                            {{ $feeType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feeType.fields.title') }}
                        </th>
                        <td>
                            {{ $feeType->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feeType.fields.fee') }}
                        </th>
                        <td>
                            {{ $feeType->fee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feeType.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\FeeType::TYPE_SELECT[$feeType->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.feeType.fields.no_of_months') }}
                        </th>
                        <td>
                            {{ $feeType->no_of_months }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fee-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection