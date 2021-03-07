<?php

namespace App\Http\Requests;

use App\Models\Instalment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInstalmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('instalment_create');
    }

    public function rules()
    {
        return [
            'student_id'     => [
                'required',
                'integer',
            ],
            'title'          => [
                'string',
                'required',
            ],
            'amount'         => [
                'required',
            ],
            'payment_mehtod' => [
                'string',
                'nullable',
            ],
            'payment'        => [
                'string',
                'nullable',
            ],
        ];
    }
}
