@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ingreso.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ingresos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ingreso.fields.id') }}
                        </th>
                        <td>
                            {{ $ingreso->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingreso.fields.supplier') }}
                        </th>
                        <td>
                            {{ $ingreso->supplier->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingreso.fields.bill') }}
                        </th>
                        <td>
                            {{ $ingreso->bill }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingreso.fields.product') }}
                        </th>
                        <td>
                            {{ $ingreso->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingreso.fields.unit_price') }}
                        </th>
                        <td>
                            {{ $ingreso->unit_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingreso.fields.unit_per_box') }}
                        </th>
                        <td>
                            {{ $ingreso->unit_per_box }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingreso.fields.quantity') }}
                        </th>
                        <td>
                            {{ $ingreso->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingreso.fields.lote') }}
                        </th>
                        <td>
                            {{ $ingreso->lote }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ingreso.fields.expiration_day') }}
                        </th>
                        <td>
                            {{ $ingreso->expiration_day }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ingresos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection