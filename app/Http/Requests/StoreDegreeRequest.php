<?php

namespace App\Http\Requests;

use App\Models\Degree;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDegreeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('degree_create');
    }

    public function rules()
    {
        return [
            'name'        => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'type'        => [
                'required',
            ],
            'fee_type'    => [
                'required',
            ],
            'duration'    => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'subjects.*'  => [
                'integer',
            ],
            'subjects'    => [
                'array',
            ],
        ];
    }
}
