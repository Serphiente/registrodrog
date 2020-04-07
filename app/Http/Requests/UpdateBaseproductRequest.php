<?php

namespace App\Http\Requests;

use App\Baseproduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateBaseproductRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('baseproduct_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'name'            => [
                'required',
                'unique:baseproducts,name,' . request()->route('baseproduct')->id],
            'raw_materials.*' => [
                'integer'],
            'raw_materials'   => [
                'required',
                'array'],
        ];

    }
}
