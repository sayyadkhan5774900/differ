@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.fee.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.fees.store") }}" enctype="multipart/form-data">
            @csrf
            @livewire('admin.fee.create.form-body')

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
