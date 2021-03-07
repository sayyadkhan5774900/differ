@extends('layouts.admin')
@section('content')
@can('fee_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.fees.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.fee.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.fee.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Fee">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.fee.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.fee.fields.student') }}
                        </th>
                        <th>
                            {{ trans('cruds.fee.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.fee.fields.fee') }}
                        </th>
                        <th>
                            {{ trans('cruds.fee.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.fee.fields.no_of_months') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fees as $key => $fee)
                        <tr data-entry-id="{{ $fee->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $fee->id ?? '' }}
                            </td>
                            <td>
                                {{ $fee->student->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $fee->title ?? '' }}
                            </td>
                            <td>
                                {{ $fee->fee ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Fee::TYPE_SELECT[$fee->type] ?? '' }}
                            </td>
                            <td>
                                {{ $fee->no_of_months ?? '' }}
                            </td>
                            <td>
                                @can('fee_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.fees.show', $fee->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('fee_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.fees.edit', $fee->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('fee_delete')
                                    <form action="{{ route('admin.fees.destroy', $fee->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('fee_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.fees.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-Fee:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection