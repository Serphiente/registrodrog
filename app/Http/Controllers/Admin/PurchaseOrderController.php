<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\ClientContact;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPurchaseOrderRequest;
use App\Http\Requests\StorePurchaseOrderRequest;
use App\Http\Requests\UpdatePurchaseOrderRequest;
use App\PurchaseOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PurchaseOrderController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('purchase_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PurchaseOrder::with(['client', 'client_contact'])->select(sprintf('%s.*', (new PurchaseOrder)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'purchase_order_show';
                $editGate      = 'purchase_order_edit';
                $deleteGate    = 'purchase_order_delete';
                $crudRoutePart = 'purchase-orders';

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
            $table->addColumn('client_contact_name', function ($row) {
                return $row->client_contact ? $row->client_contact->name : '';
            });

            $table->editColumn('client_contact.department', function ($row) {
                return $row->client_contact ? (is_string($row->client_contact) ? $row->client_contact : $row->client_contact->department) : '';
            });

            $table->editColumn('invoice_number', function ($row) {
                return $row->invoice_number ? $row->invoice_number : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'client', 'client_contact']);

            return $table->make(true);
        }

        return view('admin.purchaseOrders.index');
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $client_contacts = ClientContact::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.purchaseOrders.create', compact('clients', 'client_contacts'));
    }

    public function store(StorePurchaseOrderRequest $request)
    {
        $purchaseOrder = PurchaseOrder::create($request->all());

        return redirect()->route('admin.purchase-orders.index');

    }

    public function edit(PurchaseOrder $purchaseOrder)
    {
        abort_if(Gate::denies('purchase_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $client_contacts = ClientContact::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchaseOrder->load('client', 'client_contact');

        return view('admin.purchaseOrders.edit', compact('clients', 'client_contacts', 'purchaseOrder'));
    }

    public function update(UpdatePurchaseOrderRequest $request, PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->update($request->all());

        return redirect()->route('admin.purchase-orders.index');

    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        abort_if(Gate::denies('purchase_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseOrder->load('client', 'client_contact');

        return view('admin.purchaseOrders.show', compact('purchaseOrder'));
    }

    public function destroy(PurchaseOrder $purchaseOrder)
    {
        abort_if(Gate::denies('purchase_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseOrder->delete();

        return back();

    }

    public function massDestroy(MassDestroyPurchaseOrderRequest $request)
    {
        PurchaseOrder::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

}
