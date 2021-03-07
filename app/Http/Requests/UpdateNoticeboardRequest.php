<?php

namespace App\Http\Requests;

use App\Models\Noticeboard;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNoticeboardRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('noticeboard_edit');
    }

    public function rules()
    {
        return [
            'title'   => [
                'string',
                'required',
            ],
            'link_to' => [
                'required',
            ],
            'url'     => [
                'string',
                'nullable',
            ],
        ];
    }
}
