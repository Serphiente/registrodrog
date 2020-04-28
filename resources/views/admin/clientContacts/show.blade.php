@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.clientContact.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.client-contacts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.clientContact.fields.id') }}
                        </th>
                        <td>
                            {{ $clientContact->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientContact.fields.client') }}
                        </th>
                        <td>
                            {{ $clientContact->client->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientContact.fields.name') }}
                        </th>
                        <td>
                            {{ $clientContact->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientContact.fields.email') }}
                        </th>
                        <td>
                            {{ $clientContact->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientContact.fields.phone') }}
                        </th>
                        <td>
                            {{ $clientContact->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientContact.fields.department') }}
                        </th>
                        <td>
                            {{ $clientContact->department }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientContact.fields.another_info') }}
                        </th>
                        <td>
                            {{ $clientContact->another_info }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.client-contacts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection