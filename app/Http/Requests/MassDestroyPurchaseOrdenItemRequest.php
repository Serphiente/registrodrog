<?php

namespace App\Http\Requests;

use App\PurchaseOrdenItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPurchaseOrdenItemRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('purchase_orden_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:purchase_orden_items,id',
        ];

    }
}
