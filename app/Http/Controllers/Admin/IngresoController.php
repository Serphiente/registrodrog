<?php

namespace App\Http\Controllers\Admin;

use App\Baseproduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIngresoRequest;
use App\Http\Requests\StoreIngresoRequest;
use App\Http\Requests\UpdateIngresoRequest;
use App\Ingreso;
use App\Supplier;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class IngresoController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('ingreso_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Ingreso::with(['supplier', 'product'])->select(sprintf('%s.*', (new Ingreso)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'ingreso_show';
                $editGate      = 'ingreso_edit';
                $deleteGate    = 'ingreso_delete';
                $crudRoutePart = 'ingresos';

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
            $table->addColumn('supplier_name', function ($row) {
                return $row->supplier ? $row->supplier->name : '';
            });

            $table->editColumn('bill', function ($row) {
                return $row->bill ? $row->bill : "";
            });
            $table->addColumn('product_name', function ($row) {
                return $row->product ? $row->product->name : '';
            });

            $table->editColumn('product.medida', function ($row) {
                return $row->product ? (is_string($row->product) ? $row->product : $row->product->medida) : '';
            });
            $table->editColumn('unit_price', function ($row) {
                return $row->unit_price ? $row->unit_price : "";
            });
            $table->editColumn('unit_per_box', function ($row) {
                return $row->unit_per_box ? $row->unit_per_box : "";
            });
            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : "";
            });
            $table->editColumn('lote', function ($row) {
                return $row->lote ? $row->lote : "";
            });
            $table->editColumn('expiration_day', function ($row) {
                return $row->expiration_day ? $row->expiration_day : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'supplier', 'product']);

            return $table->make(true);
        }

        return view('admin.ingresos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('ingreso_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = Supplier::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Baseproduct::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.ingresos.create', compact('suppliers', 'products'));
    }

    public function store(StoreIngresoRequest $request)
    {
        $ingreso = Ingreso::create($request->all());

        return redirect()->route('admin.ingresos.index');

    }

    public function edit(Ingreso $ingreso)
    {
        abort_if(Gate::denies('ingreso_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $suppliers = Supplier::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Baseproduct::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ingreso->load('supplier', 'product');

        return view('admin.ingresos.edit', compact('suppliers', 'products', 'ingreso'));
    }

    public function update(UpdateIngresoRequest $request, Ingreso $ingreso)
    {
        $ingreso->update($request->all());

        return redirect()->route('admin.ingresos.index');

    }

    public function show(Ingreso $ingreso)
    {
        abort_if(Gate::denies('ingreso_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingreso->load('supplier', 'product');

        return view('admin.ingresos.show', compact('ingreso'));
    }

    public function destroy(Ingreso $ingreso)
    {
        abort_if(Gate::denies('ingreso_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ingreso->delete();

        return back();

    }

    public function massDestroy(MassDestroyIngresoRequest $request)
    {
        Ingreso::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

}
