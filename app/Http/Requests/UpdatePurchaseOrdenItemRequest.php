<?php

namespace App\Http\Requests;

use App\PurchaseOrdenItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdatePurchaseOrdenItemRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('purchase_orden_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'number' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647'],
        ];

    }
}
