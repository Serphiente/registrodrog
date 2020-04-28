@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.clientContact.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.client-contacts.update", [$clientContact->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="client_id">{{ trans('cruds.clientContact.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id" required>
                    @foreach($clients as $id => $client)
                        <option value="{{ $id }}" {{ ($clientContact->client ? $clientContact->client->id : old('client_id')) == $id ? 'selected' : '' }}>{{ $client }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <span class="text-danger">{{ $errors->first('client') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientContact.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.clientContact.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $clientContact->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientContact.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.clientContact.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $clientContact->email) }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientContact.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.clientContact.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $clientContact->phone) }}">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientContact.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="department">{{ trans('cruds.clientContact.fields.department') }}</label>
                <input class="form-control {{ $errors->has('department') ? 'is-invalid' : '' }}" type="text" name="department" id="department" value="{{ old('department', $clientContact->department) }}">
                @if($errors->has('department'))
                    <span class="text-danger">{{ $errors->first('department') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientContact.fields.department_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="another_info">{{ trans('cruds.clientContact.fields.another_info') }}</label>
                <textarea class="form-control {{ $errors->has('another_info') ? 'is-invalid' : '' }}" name="another_info" id="another_info">{{ old('another_info', $clientContact->another_info) }}</textarea>
                @if($errors->has('another_info'))
                    <span class="text-danger">{{ $errors->first('another_info') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.clientContact.fields.another_info_helper') }}</span>
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