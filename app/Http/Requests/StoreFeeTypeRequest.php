<?php

namespace App\Http\Requests;

use App\Models\FeeType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFeeTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fee_type_create');
    }

    public function rules()
    {
        return [
            'title'        => [
                'string',
                'required',
            ],
            'fee'          => [
                'required',
                'unique:fee_types,fee',
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
