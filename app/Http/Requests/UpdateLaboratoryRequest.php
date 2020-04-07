<?php

namespace App\Http\Requests;

use App\Laboratory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateLaboratoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('laboratory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'name' => [
                'required'],
        ];

    }
}