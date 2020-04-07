<?php

namespace App\Http\Requests;

use App\RawMaterial;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateRawMaterialRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('raw_material_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'material' => [
                'required'],
        ];

    }
}
