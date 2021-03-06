@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('noticeboard_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.noticeboards.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.noticeboard.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.noticeboard.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Noticeboard">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.noticeboard.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.noticeboard.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.noticeboard.fields.link_to') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.noticeboard.fields.url') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.noticeboard.fields.attachment') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($noticeboards as $key => $noticeboard)
                                    <tr data-entry-id="{{ $noticeboard->id }}">
                                        <td>
                                            {{ $noticeboard->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $noticeboard->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Noticeboard::LINK_TO_RADIO[$noticeboard->link_to] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $noticeboard->url ?? '' }}
                                        </td>
                                        <td>
                                            @if($noticeboard->attachment)
                                                <a href="{{ $noticeboard->attachment->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @can('noticeboard_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.noticeboards.show', $noticeboard->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('noticeboard_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.noticeboards.edit', $noticeboard->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('noticeboard_delete')
                                                <form action="{{ route('frontend.noticeboards.destroy', $noticeboard->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('noticeboard_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.noticeboards.massDestroy') }}",
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
  let table = $('.datatable-Noticeboard:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection