@extends('layouts.admin')
@section('content')
@can('instalment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.instalments.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.instalment.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.instalment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Instalment">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.instalment.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.instalment.fields.student') }}
                        </th>
                        <th>
                            {{ trans('cruds.instalment.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.instalment.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.instalment.fields.payment_mehtod') }}
                        </th>
                        <th>
                            {{ trans('cruds.instalment.fields.payment') }}
                        </th>
                        <th>
                            {{ trans('cruds.instalment.fields.payment_proof') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($instalments as $key => $instalment)
                        <tr data-entry-id="{{ $instalment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $instalment->id ?? '' }}
                            </td>
                            <td>
                                {{ $instalment->student->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $instalment->title ?? '' }}
                            </td>
                            <td>
                                {{ $instalment->amount ?? '' }}
                            </td>
                            <td>
                                {{ $instalment->payment_mehtod ?? '' }}
                            </td>
                            <td>
                                {{ $instalment->payment ?? '' }}
                            </td>
                            <td>
                                @if($instalment->payment_proof)
                                    <a href="{{ $instalment->payment_proof->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $instalment->payment_proof->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('instalment_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.instalments.show', $instalment->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('instalment_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.instalments.edit', $instalment->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('instalment_delete')
                                    <form action="{{ route('admin.instalments.destroy', $instalment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('instalment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.instalments.massDestroy') }}",
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
  let table = $('.datatable-Instalment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection