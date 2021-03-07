<?php

namespace App\Http\Requests;

use App\Models\TeamMemeber;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTeamMemeberRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('team_memeber_edit');
    }

    public function rules()
    {
        return [
            'name'           => [
                'string',
                'required',
            ],
            'position'       => [
                'string',
                'nullable',
            ],
            'twitter_link'   => [
                'string',
                'nullable',
            ],
            'facebook_link'  => [
                'string',
                'nullable',
            ],
            'instagram_link' => [
                'string',
                'nullable',
            ],
            'linkedin_link'  => [
                'string',
                'nullable',
            ],
        ];
    }
}
