@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.ingreso.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ingresos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="supplier_id">{{ trans('cruds.ingreso.fields.supplier') }}</label>
                <select class="form-control select2 {{ $errors->has('supplier') ? 'is-invalid' : '' }}" name="supplier_id" id="supplier_id" required>
                    @foreach($suppliers as $id => $supplier)
                        <option value="{{ $id }}" {{ old('supplier_id') == $id ? 'selected' : '' }}>{{ $supplier }}</option>
                    @endforeach
                </select>
                @if($errors->has('supplier'))
                    <span class="text-danger">{{ $errors->first('supplier') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingreso.fields.supplier_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bill">{{ trans('cruds.ingreso.fields.bill') }}</label>
                <input class="form-control {{ $errors->has('bill') ? 'is-invalid' : '' }}" type="number" name="bill" id="bill" value="{{ old('bill', '') }}" step="1">
                @if($errors->has('bill'))
                    <span class="text-danger">{{ $errors->first('bill') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingreso.fields.bill_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="product_id">{{ trans('cruds.ingreso.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id" required>
                    @foreach($products as $id => $product)
                        <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $product }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <span class="text-danger">{{ $errors->first('product') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingreso.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unit_price">{{ trans('cruds.ingreso.fields.unit_price') }}</label>
                <input class="form-control {{ $errors->has('unit_price') ? 'is-invalid' : '' }}" type="number" name="unit_price" id="unit_price" value="{{ old('unit_price', '') }}" step="0.01">
                @if($errors->has('unit_price'))
                    <span class="text-danger">{{ $errors->first('unit_price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingreso.fields.unit_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="unit_per_box">{{ trans('cruds.ingreso.fields.unit_per_box') }}</label>
                <input class="form-control {{ $errors->has('unit_per_box') ? 'is-invalid' : '' }}" type="number" name="unit_per_box" id="unit_per_box" value="{{ old('unit_per_box', '') }}" step="1">
                @if($errors->has('unit_per_box'))
                    <span class="text-danger">{{ $errors->first('unit_per_box') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingreso.fields.unit_per_box_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quantity">{{ trans('cruds.ingreso.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="text" name="quantity" id="quantity" value="{{ old('quantity', '') }}">
                @if($errors->has('quantity'))
                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingreso.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lote">{{ trans('cruds.ingreso.fields.lote') }}</label>
                <input class="form-control {{ $errors->has('lote') ? 'is-invalid' : '' }}" type="text" name="lote" id="lote" value="{{ old('lote', '') }}">
                @if($errors->has('lote'))
                    <span class="text-danger">{{ $errors->first('lote') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingreso.fields.lote_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expiration_day">{{ trans('cruds.ingreso.fields.expiration_day') }}</label>
                <input class="form-control {{ $errors->has('expiration_day') ? 'is-invalid' : '' }}" type="text" name="expiration_day" id="expiration_day" value="{{ old('expiration_day', '') }}">
                @if($errors->has('expiration_day'))
                    <span class="text-danger">{{ $errors->first('expiration_day') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ingreso.fields.expiration_day_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection