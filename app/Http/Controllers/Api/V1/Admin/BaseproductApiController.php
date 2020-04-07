<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Baseproduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBaseproductRequest;
use App\Http\Requests\UpdateBaseproductRequest;
use App\Http\Resources\Admin\BaseproductResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BaseproductApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('baseproduct_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BaseproductResource(Baseproduct::with(['raw_materials', 'laboratory'])->get());

    }

    public function store(StoreBaseproductRequest $request)
    {
        $baseproduct = Baseproduct::create($request->all());
        $baseproduct->raw_materials()->sync($request->input('raw_materials', []));

        return (new BaseproductResource($baseproduct))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(Baseproduct $baseproduct)
    {
        abort_if(Gate::denies('baseproduct_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BaseproductResource($baseproduct->load(['raw_materials', 'laboratory']));

    }

    public function update(UpdateBaseproductRequest $request, Baseproduct $baseproduct)
    {
        $baseproduct->update($request->all());
        $baseproduct->raw_materials()->sync($request->input('raw_materials', []));

        return (new BaseproductResource($baseproduct))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(Baseproduct $baseproduct)
    {
        abort_if(Gate::denies('baseproduct_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $baseproduct->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
