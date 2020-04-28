<?php

namespace App\Http\Requests;

use App\Ingreso;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreIngresoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ingreso_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'supplier_id'  => [
                'required',
                'integer'],
            'bill'         => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647'],
            'product_id'   => [
                'required',
                'integer'],
            'unit_per_box' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647'],
        ];

    }
}
