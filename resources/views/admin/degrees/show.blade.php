@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.degree.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.degrees.index') }}">
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
                <a class="btn btn-default" href="{{ route('admin.degrees.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#degree_batches" role="tab" data-toggle="tab">
                {{ trans('cruds.batch.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#degree_students" role="tab" data-toggle="tab">
                {{ trans('cruds.student.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="degree_batches">
            @includeIf('admin.degrees.relationships.degreeBatches', ['batches' => $degree->degreeBatches])
        </div>
        <div class="tab-pane" role="tabpanel" id="degree_students">
            @includeIf('admin.degrees.relationships.degreeStudents', ['students' => $degree->degreeStudents])
        </div>
    </div>
</div>

@endsection