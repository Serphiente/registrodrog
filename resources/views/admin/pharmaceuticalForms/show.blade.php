@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pharmaceuticalForm.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pharmaceutical-forms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pharmaceuticalForm.fields.id') }}
                        </th>
                        <td>
                            {{ $pharmaceuticalForm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pharmaceuticalForm.fields.long_name') }}
                        </th>
                        <td>
                            {{ $pharmaceuticalForm->long_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pharmaceuticalForm.fields.short_name') }}
                        </th>
                        <td>
                            {{ $pharmaceuticalForm->short_name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pharmaceutical-forms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection