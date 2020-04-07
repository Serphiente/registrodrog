<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLaboratoryRequest;
use App\Http\Requests\UpdateLaboratoryRequest;
use App\Http\Resources\Admin\LaboratoryResource;
use App\Laboratory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LaboratoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('laboratory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LaboratoryResource(Laboratory::all());

    }

    public function store(StoreLaboratoryRequest $request)
    {
        $laboratory = Laboratory::create($request->all());

        return (new LaboratoryResource($laboratory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(Laboratory $laboratory)
    {
        abort_if(Gate::denies('laboratory_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LaboratoryResource($laboratory);

    }

    public function update(UpdateLaboratoryRequest $request, Laboratory $laboratory)
    {
        $laboratory->update($request->all());

        return (new LaboratoryResource($laboratory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(Laboratory $laboratory)
    {
        abort_if(Gate::denies('laboratory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $laboratory->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
