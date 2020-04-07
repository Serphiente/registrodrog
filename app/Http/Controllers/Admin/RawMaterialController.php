<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRawMaterialRequest;
use App\Http\Requests\StoreRawMaterialRequest;
use App\Http\Requests\UpdateRawMaterialRequest;
use App\RawMaterial;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RawMaterialController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('raw_material_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rawMaterials = RawMaterial::all();

        return view('admin.rawMaterials.index', compact('rawMaterials'));
    }

    public function create()
    {
        abort_if(Gate::denies('raw_material_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rawMaterials.create');
    }

    public function store(StoreRawMaterialRequest $request)
    {
        $rawMaterial = RawMaterial::create($request->all());

        return redirect()->route('admin.raw-materials.index');

    }

    public function edit(RawMaterial $rawMaterial)
    {
        abort_if(Gate::denies('raw_material_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rawMaterials.edit', compact('rawMaterial'));
    }

    public function update(UpdateRawMaterialRequest $request, RawMaterial $rawMaterial)
    {
        $rawMaterial->update($request->all());

        return redirect()->route('admin.raw-materials.index');

    }

    public function show(RawMaterial $rawMaterial)
    {
        abort_if(Gate::denies('raw_material_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rawMaterials.show', compact('rawMaterial'));
    }

    public function destroy(RawMaterial $rawMaterial)
    {
        abort_if(Gate::denies('raw_material_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rawMaterial->delete();

        return back();

    }

    public function massDestroy(MassDestroyRawMaterialRequest $request)
    {
        RawMaterial::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
