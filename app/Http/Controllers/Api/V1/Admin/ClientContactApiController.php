<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ClientContact;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientContactRequest;
use App\Http\Requests\UpdateClientContactRequest;
use App\Http\Resources\Admin\ClientContactResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientContactApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('client_contact_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClientContactResource(ClientContact::with(['client'])->get());

    }

    public function store(StoreClientContactRequest $request)
    {
        $clientContact = ClientContact::create($request->all());

        return (new ClientContactResource($clientContact))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(ClientContact $clientContact)
    {
        abort_if(Gate::denies('client_contact_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ClientContactResource($clientContact->load(['client']));

    }

    public function update(UpdateClientContactRequest $request, ClientContact $clientContact)
    {
        $clientContact->update($request->all());

        return (new ClientContactResource($clientContact))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(ClientContact $clientContact)
    {
        abort_if(Gate::denies('client_contact_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientContact->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
