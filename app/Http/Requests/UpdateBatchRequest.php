<?php

namespace App\Http\Requests;

use App\Models\Batch;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBatchRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('batch_edit');
    }

    public function rules()
    {
        return [
            'degree_id'     => [
                'required',
                'integer',
            ],
            'batch_code'    => [
                'string',
                'required',
            ],
            'batch_name'    => [
                'string',
                'nullable',
            ],
            'start_time'    => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'end_time'      => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'starting_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'ending_date'   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'is_active'     => [
                'required',
            ],
        ];
    }
}
