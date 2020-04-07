<?php

namespace App\Http\Requests;

use App\Baseproduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBaseproductRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('baseproduct_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:baseproducts,id',
        ];

    }
}
