@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pharmaceuticalForm.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pharmaceutical-forms.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="long_name">{{ trans('cruds.pharmaceuticalForm.fields.long_name') }}</label>
                <input class="form-control {{ $errors->has('long_name') ? 'is-invalid' : '' }}" type="text" name="long_name" id="long_name" value="{{ old('long_name', '') }}" required>
                @if($errors->has('long_name'))
                    <span class="text-danger">{{ $errors->first('long_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pharmaceuticalForm.fields.long_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="short_name">{{ trans('cruds.pharmaceuticalForm.fields.short_name') }}</label>
                <input class="form-control {{ $errors->has('short_name') ? 'is-invalid' : '' }}" type="text" name="short_name" id="short_name" value="{{ old('short_name', '') }}" required>
                @if($errors->has('short_name'))
                    <span class="text-danger">{{ $errors->first('short_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.pharmaceuticalForm.fields.short_name_helper') }}</span>
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