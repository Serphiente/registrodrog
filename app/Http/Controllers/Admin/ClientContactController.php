<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\ClientContact;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClientContactRequest;
use App\Http\Requests\StoreClientContactRequest;
use App\Http\Requests\UpdateClientContactRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ClientContactController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('client_contact_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ClientContact::with(['client'])->select(sprintf('%s.*', (new ClientContact)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'client_contact_show';
                $editGate      = 'client_contact_edit';
                $deleteGate    = 'client_contact_delete';
                $crudRoutePart = 'client-contacts';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('client_name', function ($row) {
                return $row->client ? $row->client->name : '';
            });

            $table->editColumn('client.rut', function ($row) {
                return $row->client ? (is_string($row->client) ? $row->client : $row->client->rut) : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : "";
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : "";
            });
            $table->editColumn('department', function ($row) {
                return $row->department ? $row->department : "";
            });
            $table->editColumn('another_info', function ($row) {
                return $row->another_info ? $row->another_info : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'client']);

            return $table->make(true);
        }

        return view('admin.clientContacts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('client_contact_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.clientContacts.create', compact('clients'));
    }

    public function store(StoreClientContactRequest $request)
    {
        $clientContact = ClientContact::create($request->all());

        return redirect()->route('admin.client-contacts.index');

    }

    public function edit(ClientContact $clientContact)
    {
        abort_if(Gate::denies('client_contact_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clientContact->load('client');

        return view('admin.clientContacts.edit', compact('clients', 'clientContact'));
    }

    public function update(UpdateClientContactRequest $request, ClientContact $clientContact)
    {
        $clientContact->update($request->all());

        return redirect()->route('admin.client-contacts.index');

    }

    public function show(ClientContact $clientContact)
    {
        abort_if(Gate::denies('client_contact_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientContact->load('client');

        return view('admin.clientContacts.show', compact('clientContact'));
    }

    public function destroy(ClientContact $clientContact)
    {
        abort_if(Gate::denies('client_contact_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientContact->delete();

        return back();

    }

    public function massDestroy(MassDestroyClientContactRequest $request)
    {
        ClientContact::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

}
