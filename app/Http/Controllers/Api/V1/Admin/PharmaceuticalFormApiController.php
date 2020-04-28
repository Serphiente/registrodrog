<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePharmaceuticalFormRequest;
use App\Http\Requests\UpdatePharmaceuticalFormRequest;
use App\Http\Resources\Admin\PharmaceuticalFormResource;
use App\PharmaceuticalForm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PharmaceuticalFormApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pharmaceutical_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PharmaceuticalFormResource(PharmaceuticalForm::all());

    }

    public function store(StorePharmaceuticalFormRequest $request)
    {
        $pharmaceuticalForm = PharmaceuticalForm::create($request->all());

        return (new PharmaceuticalFormResource($pharmaceuticalForm))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);

    }

    public function show(PharmaceuticalForm $pharmaceuticalForm)
    {
        abort_if(Gate::denies('pharmaceutical_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PharmaceuticalFormResource($pharmaceuticalForm);

    }

    public function update(UpdatePharmaceuticalFormRequest $request, PharmaceuticalForm $pharmaceuticalForm)
    {
        $pharmaceuticalForm->update($request->all());

        return (new PharmaceuticalFormResource($pharmaceuticalForm))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);

    }

    public function destroy(PharmaceuticalForm $pharmaceuticalForm)
    {
        abort_if(Gate::denies('pharmaceutical_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pharmaceuticalForm->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
