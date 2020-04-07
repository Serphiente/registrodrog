<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLaboratoryRequest;
use App\Http\Requests\StoreLaboratoryRequest;
use App\Http\Requests\UpdateLaboratoryRequest;
use App\Laboratory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LaboratoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('laboratory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $laboratories = Laboratory::all();

        return view('admin.laboratories.index', compact('laboratories'));
    }

    public function create()
    {
        abort_if(Gate::denies('laboratory_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laboratories.create');
    }

    public function store(StoreLaboratoryRequest $request)
    {
        $laboratory = Laboratory::create($request->all());

        return redirect()->route('admin.laboratories.index');

    }

    public function edit(Laboratory $laboratory)
    {
        abort_if(Gate::denies('laboratory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laboratories.edit', compact('laboratory'));
    }

    public function update(UpdateLaboratoryRequest $request, Laboratory $laboratory)
    {
        $laboratory->update($request->all());

        return redirect()->route('admin.laboratories.index');

    }

    public function show(Laboratory $laboratory)
    {
        abort_if(Gate::denies('laboratory_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.laboratories.show', compact('laboratory'));
    }

    public function destroy(Laboratory $laboratory)
    {
        abort_if(Gate::denies('laboratory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $laboratory->delete();

        return back();

    }

    public function massDestroy(MassDestroyLaboratoryRequest $request)
    {
        Laboratory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
