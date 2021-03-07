<?php

namespace App\Http\Requests;

use App\Models\Noticeboard;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNoticeboardRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('noticeboard_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:noticeboards,id',
        ];
    }
}
