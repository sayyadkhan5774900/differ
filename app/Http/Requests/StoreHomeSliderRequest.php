<?php

namespace App\Http\Requests;

use App\Models\HomeSlider;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHomeSliderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('home_slider_create');
    }

    public function rules()
    {
        return [
            'title'       => [
                'string',
                'max:60',
                'required',
            ],
            'body_text'   => [
                'string',
                'max:200',
                'nullable',
            ],
            'button_link' => [
                'string',
                'nullable',
            ],
            'button_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
