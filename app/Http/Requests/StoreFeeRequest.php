<?php

namespace App\Http\Requests;

use App\Models\Fee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFeeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fee_create');
    }

    public function rules()
    {
        return [
            'student_id'   => [
                'required',
                'integer',
            ],
            'title'        => [
                'string',
                'required',
            ],
            'fee'          => [
                'required',
            ],
            'type'         => [
                'required',
            ],
            'no_of_months' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
