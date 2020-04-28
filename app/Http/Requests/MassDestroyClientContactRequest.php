<?php

namespace App\Http\Requests;

use App\ClientContact;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyClientContactRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('client_contact_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:client_contacts,id',
        ];

    }
}
