@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.purchaseOrdenItem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.purchase-orden-items.update", [$purchaseOrdenItem->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="purchase_order_id">{{ trans('cruds.purchaseOrdenItem.fields.purchase_order') }}</label>
                <select class="form-control select2 {{ $errors->has('purchase_order') ? 'is-invalid' : '' }}" name="purchase_order_id" id="purchase_order_id">
                    @foreach($purchase_orders as $id => $purchase_order)
                        <option value="{{ $id }}" {{ ($purchaseOrdenItem->purchase_order ? $purchaseOrdenItem->purchase_order->id : old('purchase_order_id')) == $id ? 'selected' : '' }}>{{ $purchase_order }}</option>
                    @endforeach
                </select>
                @if($errors->has('purchase_order'))
                    <span class="text-danger">{{ $errors->first('purchase_order') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrdenItem.fields.purchase_order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item">{{ trans('cruds.purchaseOrdenItem.fields.item') }}</label>
                <input class="form-control {{ $errors->has('item') ? 'is-invalid' : '' }}" type="text" name="item" id="item" value="{{ old('item', $purchaseOrdenItem->item) }}">
                @if($errors->has('item'))
                    <span class="text-danger">{{ $errors->first('item') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrdenItem.fields.item_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="number">{{ trans('cruds.purchaseOrdenItem.fields.number') }}</label>
                <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="number" name="number" id="number" value="{{ old('number', $purchaseOrdenItem->number) }}" step="1">
                @if($errors->has('number'))
                    <span class="text-danger">{{ $errors->first('number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrdenItem.fields.number_helper') }}</span>
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