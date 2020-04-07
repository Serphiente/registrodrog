@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.baseproduct.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.baseproducts.update", [$baseproduct->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.baseproduct.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $baseproduct->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.baseproduct.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="raw_materials">{{ trans('cruds.baseproduct.fields.raw_material') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('raw_materials') ? 'is-invalid' : '' }}" name="raw_materials[]" id="raw_materials" multiple required>
                    @foreach($raw_materials as $id => $raw_material)
                        <option value="{{ $id }}" {{ (in_array($id, old('raw_materials', [])) || $baseproduct->raw_materials->contains($id)) ? 'selected' : '' }}>{{ $raw_material }}</option>
                    @endforeach
                </select>
                @if($errors->has('raw_materials'))
                    <span class="text-danger">{{ $errors->first('raw_materials') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.baseproduct.fields.raw_material_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="laboratory_id">{{ trans('cruds.baseproduct.fields.laboratory') }}</label>
                <select class="form-control select2 {{ $errors->has('laboratory') ? 'is-invalid' : '' }}" name="laboratory_id" id="laboratory_id">
                    @foreach($laboratories as $id => $laboratory)
                        <option value="{{ $id }}" {{ ($baseproduct->laboratory ? $baseproduct->laboratory->id : old('laboratory_id')) == $id ? 'selected' : '' }}>{{ $laboratory }}</option>
                    @endforeach
                </select>
                @if($errors->has('laboratory'))
                    <span class="text-danger">{{ $errors->first('laboratory') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.baseproduct.fields.laboratory_helper') }}</span>
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