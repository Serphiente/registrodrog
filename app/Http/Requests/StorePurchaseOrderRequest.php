<?php

namespace App\Http\Requests;

use App\PurchaseOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePurchaseOrderRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('purchase_order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'client_id'      => [
                'required',
                'integer'],
            'date'           => [
                'required',
                'date_format:' . config('panel.date_format')],
            'invoice_number' => [
                'required'],
        ];

    }
}
