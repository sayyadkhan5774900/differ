<?php

namespace App\Http\Requests;

use App\Models\FeeType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFeeTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('fee_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:fee_types,id',
        ];
    }
}
