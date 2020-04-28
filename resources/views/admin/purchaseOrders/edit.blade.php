@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.purchaseOrder.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.purchase-orders.update", [$purchaseOrder->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="client_id">{{ trans('cruds.purchaseOrder.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id" required>
                    @foreach($clients as $id => $client)
                        <option value="{{ $id }}" {{ ($purchaseOrder->client ? $purchaseOrder->client->id : old('client_id')) == $id ? 'selected' : '' }}>{{ $client }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <span class="text-danger">{{ $errors->first('client') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="client_contact_id">{{ trans('cruds.purchaseOrder.fields.client_contact') }}</label>
                <select class="form-control select2 {{ $errors->has('client_contact') ? 'is-invalid' : '' }}" name="client_contact_id" id="client_contact_id">
                    @foreach($client_contacts as $id => $client_contact)
                        <option value="{{ $id }}" {{ ($purchaseOrder->client_contact ? $purchaseOrder->client_contact->id : old('client_contact_id')) == $id ? 'selected' : '' }}>{{ $client_contact }}</option>
                    @endforeach
                </select>
                @if($errors->has('client_contact'))
                    <span class="text-danger">{{ $errors->first('client_contact') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.client_contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.purchaseOrder.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $purchaseOrder->date) }}" required>
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="invoice_number">{{ trans('cruds.purchaseOrder.fields.invoice_number') }}</label>
                <input class="form-control {{ $errors->has('invoice_number') ? 'is-invalid' : '' }}" type="text" name="invoice_number" id="invoice_number" value="{{ old('invoice_number', $purchaseOrder->invoice_number) }}" required>
                @if($errors->has('invoice_number'))
                    <span class="text-danger">{{ $errors->first('invoice_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.purchaseOrder.fields.invoice_number_helper') }}</span>
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