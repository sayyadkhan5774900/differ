<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyInstalmentRequest;
use App\Http\Requests\StoreInstalmentRequest;
use App\Http\Requests\UpdateInstalmentRequest;
use App\Models\Instalment;
use App\Models\Student;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class InstalmentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('instalment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $instalments = Instalment::with(['student', 'media'])->get();

        return view('admin.instalments.index', compact('instalments'));
    }

    public function create()
    {
        abort_if(Gate::denies('instalment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = Student::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.instalments.create', compact('students'));
    }

    public function store(StoreInstalmentRequest $request)
    {
        $instalment = Instalment::create($request->all());

        if ($request->input('payment_proof', false)) {
            $instalment->addMedia(storage_path('tmp/uploads/' . $request->input('payment_proof')))->toMediaCollection('payment_proof');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $instalment->id]);
        }

        return redirect()->route('admin.instalments.index');
    }

    public function edit(Instalment $instalment)
    {
        abort_if(Gate::denies('instalment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = Student::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $instalment->load('student');

        return view('admin.instalments.edit', compact('students', 'instalment'));
    }

    public function update(UpdateInstalmentRequest $request, Instalment $instalment)
    {
        $instalment->update($request->all());

        if ($request->input('payment_proof', false)) {
            if (!$instalment->payment_proof || $request->input('payment_proof') !== $instalment->payment_proof->file_name) {
                if ($instalment->payment_proof) {
                    $instalment->payment_proof->delete();
                }

                $instalment->addMedia(storage_path('tmp/uploads/' . $request->input('payment_proof')))->toMediaCollection('payment_proof');
            }
        } elseif ($instalment->payment_proof) {
            $instalment->payment_proof->delete();
        }

        return redirect()->route('admin.instalments.index');
    }

    public function show(Instalment $instalment)
    {
        abort_if(Gate::denies('instalment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $instalment->load('student');

        return view('admin.instalments.show', compact('instalment'));
    }

    public function destroy(Instalment $instalment)
    {
        abort_if(Gate::denies('instalment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $instalment->delete();

        return back();
    }

    public function massDestroy(MassDestroyInstalmentRequest $request)
    {
        Instalment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('instalment_create') && Gate::denies('instalment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Instalment();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
