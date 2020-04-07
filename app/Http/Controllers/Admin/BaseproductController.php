<?php

namespace App\Http\Controllers\Admin;

use App\Baseproduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBaseproductRequest;
use App\Http\Requests\StoreBaseproductRequest;
use App\Http\Requests\UpdateBaseproductRequest;
use App\Laboratory;
use App\RawMaterial;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BaseproductController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('baseproduct_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $baseproducts = Baseproduct::all();

        return view('admin.baseproducts.index', compact('baseproducts'));
    }

    public function create()
    {
        abort_if(Gate::denies('baseproduct_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $raw_materials = RawMaterial::all()->pluck('material', 'id');

        $laboratories = Laboratory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.baseproducts.create', compact('raw_materials', 'laboratories'));
    }

    public function store(StoreBaseproductRequest $request)
    {
        $baseproduct = Baseproduct::create($request->all());
        $baseproduct->raw_materials()->sync($request->input('raw_materials', []));

        return redirect()->route('admin.baseproducts.index');

    }

    public function edit(Baseproduct $baseproduct)
    {
        abort_if(Gate::denies('baseproduct_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $raw_materials = RawMaterial::all()->pluck('material', 'id');

        $laboratories = Laboratory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $baseproduct->load('raw_materials', 'laboratory');

        return view('admin.baseproducts.edit', compact('raw_materials', 'laboratories', 'baseproduct'));
    }

    public function update(UpdateBaseproductRequest $request, Baseproduct $baseproduct)
    {
        $baseproduct->update($request->all());
        $baseproduct->raw_materials()->sync($request->input('raw_materials', []));

        return redirect()->route('admin.baseproducts.index');

    }

    public function show(Baseproduct $baseproduct)
    {
        abort_if(Gate::denies('baseproduct_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $baseproduct->load('raw_materials', 'laboratory');

        return view('admin.baseproducts.show', compact('baseproduct'));
    }

    public function destroy(Baseproduct $baseproduct)
    {
        abort_if(Gate::denies('baseproduct_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $baseproduct->delete();

        return back();

    }

    public function massDestroy(MassDestroyBaseproductRequest $request)
    {
        Baseproduct::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
