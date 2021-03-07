<?php

namespace App\Http\Requests;

use App\Models\Noticeboard;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNoticeboardRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('noticeboard_create');
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
