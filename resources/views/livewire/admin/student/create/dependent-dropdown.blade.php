<div>
    <div class="form-group">
        <label class="required" for="degree_id">{{ trans('cruds.student.fields.degree') }}</label>
        <select wire:model="degree" class="form-control" name="degree_id" id="degree_id" required>
            <option value="">-- Please Select --</option>
            @foreach($degrees as $degree)
            <option value="{{ $degree->id }}" {{ old('degree_id') == $degree->id ? 'selected' : '' }}>
                {{ $degree->name }}
            </option>
            @endforeach
        </select>
        @if($errors->has('degree'))
        <div class="invalid-feedback">
            {{ $errors->first('degree') }}
        </div>
        @endif
        <span class="help-block">{{ trans('cruds.student.fields.degree_helper') }}</span>
    </div>
    <div class="form-group">
        <label class="required" for="batch_id">{{ trans('cruds.student.fields.batch') }}</label>
        <select wire:model="batch" class="form-control" name="batch_id" id="batch_id" required>
            @if ($batches->count() == 0)
            <option value="">-- choose degree first --</option>
            @else
            <option value="">-- Please Select --</option>
            @endif
            @foreach($batches as $batch)
            <option value="{{ $batch->id }}" {{ old('batch_id') == $batch->id ? 'selected' : '' }}>
                {{ $batch->batch_name}}
            </option>
            @endforeach
        </select>
        @if($errors->has('batch'))
        <div class="invalid-feedback">
            {{ $errors->first('batch') }}
        </div>
        @endif
        <span class="help-block">{{ trans('cruds.student.fields.batch_helper') }}</span>
    </div>
</div>
