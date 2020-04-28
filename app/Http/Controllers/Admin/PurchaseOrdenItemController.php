<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPurchaseOrdenItemRequest;
use App\Http\Requests\StorePurchaseOrdenItemRequest;
use App\Http\Requests\UpdatePurchaseOrdenItemRequest;
use App\PurchaseOrdenItem;
use App\PurchaseOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PurchaseOrdenItemController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('purchase_orden_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PurchaseOrdenItem::with(['purchase_order'])->select(sprintf('%s.*', (new PurchaseOrdenItem)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'purchase_orden_item_show';
                $editGate      = 'purchase_orden_item_edit';
                $deleteGate    = 'purchase_orden_item_delete';
                $crudRoutePart = 'purchase-orden-items';

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
            $table->addColumn('purchase_order_invoice_number', function ($row) {
                return $row->purchase_order ? $row->purchase_order->invoice_number : '';
            });

            $table->editColumn('purchase_order.date', function ($row) {
                return $row->purchase_order ? (is_string($row->purchase_order) ? $row->purchase_order : $row->purchase_order->date) : '';
            });
            $table->editColumn('item', function ($row) {
                return $row->item ? $row->item : "";
            });
            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'purchase_order']);

            return $table->make(true);
        }

        return view('admin.purchaseOrdenItems.index');
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_orden_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchase_orders = PurchaseOrder::all()->pluck('invoice_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.purchaseOrdenItems.create', compact('purchase_orders'));
    }

    public function store(StorePurchaseOrdenItemRequest $request)
    {
        $purchaseOrdenItem = PurchaseOrdenItem::create($request->all());

        return redirect()->route('admin.purchase-orden-items.index');

    }

    public function edit(PurchaseOrdenItem $purchaseOrdenItem)
    {
        abort_if(Gate::denies('purchase_orden_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchase_orders = PurchaseOrder::all()->pluck('invoice_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchaseOrdenItem->load('purchase_order');

        return view('admin.purchaseOrdenItems.edit', compact('purchase_orders', 'purchaseOrdenItem'));
    }

    public function update(UpdatePurchaseOrdenItemRequest $request, PurchaseOrdenItem $purchaseOrdenItem)
    {
        $purchaseOrdenItem->update($request->all());

        return redirect()->route('admin.purchase-orden-items.index');

    }

    public function show(PurchaseOrdenItem $purchaseOrdenItem)
    {
        abort_if(Gate::denies('purchase_orden_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseOrdenItem->load('purchase_order');

        return view('admin.purchaseOrdenItems.show', compact('purchaseOrdenItem'));
    }

    public function destroy(PurchaseOrdenItem $purchaseOrdenItem)
    {
        abort_if(Gate::denies('purchase_orden_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseOrdenItem->delete();

        return back();

    }

    public function massDestroy(MassDestroyPurchaseOrdenItemRequest $request)
    {
        PurchaseOrdenItem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

}
