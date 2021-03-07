<?php

namespace App\Http\Requests;

use App\Models\FeeType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFeeTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fee_type_edit');
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
                'unique:fee_types,fee,' . request()->route('fee_type')->id,
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
