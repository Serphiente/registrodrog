@extends('layouts.admin')
@section('content')
@can('ingreso_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.ingresos.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.ingreso.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.ingreso.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Ingreso">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.ingreso.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.ingreso.fields.supplier') }}
                    </th>
                    <th>
                        {{ trans('cruds.ingreso.fields.bill') }}
                    </th>
                    <th>
                        {{ trans('cruds.ingreso.fields.product') }}
                    </th>
                    <th>
                        {{ trans('cruds.baseproduct.fields.medida') }}
                    </th>
                    <th>
                        {{ trans('cruds.ingreso.fields.unit_price') }}
                    </th>
                    <th>
                        {{ trans('cruds.ingreso.fields.unit_per_box') }}
                    </th>
                    <th>
                        {{ trans('cruds.ingreso.fields.quantity') }}
                    </th>
                    <th>
                        {{ trans('cruds.ingreso.fields.lote') }}
                    </th>
                    <th>
                        {{ trans('cruds.ingreso.fields.expiration_day') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('ingreso_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.ingresos.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.ingresos.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'supplier_name', name: 'supplier.name' },
{ data: 'bill', name: 'bill' },
{ data: 'product_name', name: 'product.name' },
{ data: 'product.medida', name: 'product.medida' },
{ data: 'unit_price', name: 'unit_price' },
{ data: 'unit_per_box', name: 'unit_per_box' },
{ data: 'quantity', name: 'quantity' },
{ data: 'lote', name: 'lote' },
{ data: 'expiration_day', name: 'expiration_day' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  $('.datatable-Ingreso').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection