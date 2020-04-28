<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPharmaceuticalFormRequest;
use App\Http\Requests\StorePharmaceuticalFormRequest;
use App\Http\Requests\UpdatePharmaceuticalFormRequest;
use App\PharmaceuticalForm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PharmaceuticalFormController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pharmaceutical_form_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pharmaceuticalForms = PharmaceuticalForm::all();

        return view('admin.pharmaceuticalForms.index', compact('pharmaceuticalForms'));
    }

    public function create()
    {
        abort_if(Gate::denies('pharmaceutical_form_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pharmaceuticalForms.create');
    }

    public function store(StorePharmaceuticalFormRequest $request)
    {
        $pharmaceuticalForm = PharmaceuticalForm::create($request->all());

        return redirect()->route('admin.pharmaceutical-forms.index');

    }

    public function edit(PharmaceuticalForm $pharmaceuticalForm)
    {
        abort_if(Gate::denies('pharmaceutical_form_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pharmaceuticalForms.edit', compact('pharmaceuticalForm'));
    }

    public function update(UpdatePharmaceuticalFormRequest $request, PharmaceuticalForm $pharmaceuticalForm)
    {
        $pharmaceuticalForm->update($request->all());

        return redirect()->route('admin.pharmaceutical-forms.index');

    }

    public function show(PharmaceuticalForm $pharmaceuticalForm)
    {
        abort_if(Gate::denies('pharmaceutical_form_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pharmaceuticalForms.show', compact('pharmaceuticalForm'));
    }

    public function destroy(PharmaceuticalForm $pharmaceuticalForm)
    {
        abort_if(Gate::denies('pharmaceutical_form_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pharmaceuticalForm->delete();

        return back();

    }

    public function massDestroy(MassDestroyPharmaceuticalFormRequest $request)
    {
        PharmaceuticalForm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
