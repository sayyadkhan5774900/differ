@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.student.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.students.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $student->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.degree') }}
                                    </th>
                                    <td>
                                        {{ $student->degree->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.batch') }}
                                    </th>
                                    <td>
                                        {{ $student->batch->batch_code ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.first_name') }}
                                    </th>
                                    <td>
                                        {{ $student->first_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.last_name') }}
                                    </th>
                                    <td>
                                        {{ $student->last_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.gender') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Student::GENDER_RADIO[$student->gender] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.date_of_birth') }}
                                    </th>
                                    <td>
                                        {{ $student->date_of_birth }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.father_name') }}
                                    </th>
                                    <td>
                                        {{ $student->father_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.mother_name') }}
                                    </th>
                                    <td>
                                        {{ $student->mother_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.address') }}
                                    </th>
                                    <td>
                                        {!! $student->address !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.city') }}
                                    </th>
                                    <td>
                                        {{ $student->city }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.zip_code') }}
                                    </th>
                                    <td>
                                        {{ $student->zip_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.state') }}
                                    </th>
                                    <td>
                                        {{ $student->state }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.nationality') }}
                                    </th>
                                    <td>
                                        {{ $student->nationality }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $student->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $student->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.qualification') }}
                                    </th>
                                    <td>
                                        {{ $student->qualification }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.id_proof') }}
                                    </th>
                                    <td>
                                        @if($student->id_proof)
                                            <a href="{{ $student->id_proof->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $student->id_proof->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.photo') }}
                                    </th>
                                    <td>
                                        @if($student->photo)
                                            <a href="{{ $student->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $student->photo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.signature') }}
                                    </th>
                                    <td>
                                        @if($student->signature)
                                            <a href="{{ $student->signature->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $student->signature->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.registration_no') }}
                                    </th>
                                    <td>
                                        {{ $student->registration_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.registration_date') }}
                                    </th>
                                    <td>
                                        {{ $student->registration_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.is_active') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Student::IS_ACTIVE_SELECT[$student->is_active] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $student->user->email ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.students.index') }}">
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