<?php

namespace App\Http\Requests;

use App\Models\Invoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_create');
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
                'unique:invoices',
            ],
            'amount_payable' => [
                'required',
            ],
        ];
    }
}
