@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('home_slider_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.home-sliders.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.homeSlider.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.homeSlider.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-HomeSlider">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.body_text') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.button_link') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.homeSlider.fields.button_name') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($homeSliders as $key => $homeSlider)
                                    <tr data-entry-id="{{ $homeSlider->id }}">
                                        <td>
                                            {{ $homeSlider->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $homeSlider->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $homeSlider->body_text ?? '' }}
                                        </td>
                                        <td>
                                            {{ $homeSlider->button_link ?? '' }}
                                        </td>
                                        <td>
                                            {{ $homeSlider->button_name ?? '' }}
                                        </td>
                                        <td>
                                            @can('home_slider_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.home-sliders.show', $homeSlider->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('home_slider_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.home-sliders.edit', $homeSlider->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('home_slider_delete')
                                                <form action="{{ route('frontend.home-sliders.destroy', $homeSlider->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('home_slider_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.home-sliders.massDestroy') }}",
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
  let table = $('.datatable-HomeSlider:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection