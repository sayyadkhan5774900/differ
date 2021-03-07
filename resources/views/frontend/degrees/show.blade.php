@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.degree.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.degrees.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.degree.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $degree->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.degree.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $degree->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.degree.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $degree->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.degree.fields.type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Degree::TYPE_SELECT[$degree->type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.degree.fields.fee') }}
                                    </th>
                                    <td>
                                        {{ $degree->fee }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.degree.fields.fee_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Degree::FEE_TYPE_SELECT[$degree->fee_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.degree.fields.duration') }}
                                    </th>
                                    <td>
                                        {{ $degree->duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.degree.fields.subjects') }}
                                    </th>
                                    <td>
                                        @foreach($degree->subjects as $key => $subjects)
                                            <span class="label label-info">{{ $subjects->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.degrees.index') }}">
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