<?php

namespace App\Http\Requests;

use App\Models\Student;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStudentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('student_edit');
    }

    public function rules()
    {
        return [
            'degree_id'         => [
                'required',
                'integer',
            ],
            'batch_id'          => [
                'required',
                'integer',
            ],
            'first_name'        => [
                'string',
                'required',
            ],
            'last_name'         => [
                'string',
                'required',
            ],
            'gender'            => [
                'required',
            ],
            'date_of_birth'     => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'father_name'       => [
                'string',
                'nullable',
            ],
            'mother_name'       => [
                'string',
                'nullable',
            ],
            'city'              => [
                'string',
                'nullable',
            ],
            'zip_code'          => [
                'string',
                'nullable',
            ],
            'state'             => [
                'string',
                'nullable',
            ],
            'nationality'       => [
                'string',
                'nullable',
            ],
            'phone'             => [
                'string',
                'nullable',
            ],
            'qualification'     => [
                'string',
                'required',
            ],
            'registration_no'   => [
                'string',
                'required',
                'unique:students,registration_no,' . request()->route('student')->id,
            ],
            'registration_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
