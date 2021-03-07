@extends('layouts.admin')
@section('content')
@can('study_material_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.study-materials.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.studyMaterial.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.studyMaterial.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-StudyMaterial">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.studyMaterial.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.studyMaterial.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.studyMaterial.fields.file') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($studyMaterials as $key => $studyMaterial)
                        <tr data-entry-id="{{ $studyMaterial->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $studyMaterial->id ?? '' }}
                            </td>
                            <td>
                                {{ $studyMaterial->title ?? '' }}
                            </td>
                            <td>
                                @foreach($studyMaterial->file as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('study_material_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.study-materials.show', $studyMaterial->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('study_material_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.study-materials.edit', $studyMaterial->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('study_material_delete')
                                    <form action="{{ route('admin.study-materials.destroy', $studyMaterial->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('study_material_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.study-materials.massDestroy') }}",
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
  let table = $('.datatable-StudyMaterial:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection