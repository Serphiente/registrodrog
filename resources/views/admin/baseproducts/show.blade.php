@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.baseproduct.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.baseproducts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.baseproduct.fields.id') }}
                        </th>
                        <td>
                            {{ $baseproduct->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.baseproduct.fields.name') }}
                        </th>
                        <td>
                            {{ $baseproduct->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.baseproduct.fields.medida') }}
                        </th>
                        <td>
                            {{ $baseproduct->medida }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.baseproduct.fields.raw_material') }}
                        </th>
                        <td>
                            @foreach($baseproduct->raw_materials as $key => $raw_material)
                                <span class="label label-info">{{ $raw_material->material }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.baseproduct.fields.laboratory') }}
                        </th>
                        <td>
                            {{ $baseproduct->laboratory->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.baseproducts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection