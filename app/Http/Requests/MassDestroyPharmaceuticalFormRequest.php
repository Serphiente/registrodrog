<?php

namespace App\Http\Requests;

use App\PharmaceuticalForm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPharmaceuticalFormRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pharmaceutical_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pharmaceutical_forms,id',
        ];

    }
}
