<?php

namespace App\Http\Requests;

use App\Models\TeamMemeber;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTeamMemeberRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('team_memeber_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:team_memebers,id',
        ];
    }
}
