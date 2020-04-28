<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurchaseOrdenItemRequest;
use App\Http\Requests\UpdatePurchaseOrdenItemRequest;
use App\Http\Resources\Admin\PurchaseOrdenItemResource;
use App\PurchaseOrdenItem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PurchaseOrdenItemApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('purchase_orden_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PurchaseOrdenItemResource(PurchaseOrdenItem::with(['purchase_order'])->get());

    }

    public function store(StorePurchaseOrdenItemRequest $request)
    {
        $purchaseOrdenItem = PurchaseOrdenItem::create($request->all());

        return (new PurchaseOrdenItemResource($purchaseOrdenItem))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(PurchaseOrdenItem $purchaseOrdenItem)
    {
        abort_if(Gate::denies('purchase_orden_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PurchaseOrdenItemResource($purchaseOrdenItem->load(['purchase_order']));

    }

    public function update(UpdatePurchaseOrdenItemRequest $request, PurchaseOrdenItem $purchaseOrdenItem)
    {
        $purchaseOrdenItem->update($request->all());

        return (new PurchaseOrdenItemResource($purchaseOrdenItem))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(PurchaseOrdenItem $purchaseOrdenItem)
    {
        abort_if(Gate::denies('purchase_orden_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseOrdenItem->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
