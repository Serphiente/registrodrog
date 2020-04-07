<?php

namespace App\Http\Requests;

use App\Baseproduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreBaseproductRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('baseproduct_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'name'            => [
                'required',
                'unique:baseproducts'],
            'raw_materials.*' => [
                'integer'],
            'raw_materials'   => [
                'required',
                'array'],
        ];

    }
}
