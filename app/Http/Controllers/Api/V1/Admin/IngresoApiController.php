<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIngresoRequest;
use App\Http\Requests\UpdateIngresoRequest;
use App\Http\Resources\Admin\IngresoResource;
use App\Ingreso;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IngresoApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ingreso_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IngresoResource(Ingreso::with(['supplier', 'product'])->get());

    }

    public function store(StoreIngresoRequest $request)
    {
        $ingreso = Ingreso::create($request->all());

        return (new IngresoResource($ingreso))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(Ingreso $ingreso)
    {
        abort_if(Gate::denies('ingreso_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IngresoResource($ingreso->load(['supplier', 'product']));

    }

    public function update(UpdateIngresoRequest $request, Ingreso $ingreso)
    {
        $ingreso->update($request->all());

        return (new IngresoResource($ingreso))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(Ingreso $ingreso)
    {
        abort_if(Gate::denies('ingreso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingreso->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
