<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStudentRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Batch;
use App\Models\Degree;
use App\Models\Student;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = Student::with(['degree', 'batch', 'user', 'media'])->get();

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        abort_if(Gate::denies('student_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degrees = Degree::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $batches = Batch::all()->pluck('batch_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.students.create', compact('degrees', 'batches'));
    }

    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->all());

        if ($request->input('id_proof', false)) {
            $student->addMedia(storage_path('tmp/uploads/' . $request->input('id_proof')))->toMediaCollection('id_proof');
        }

        if ($request->input('photo', false)) {
            $student->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($request->input('signature', false)) {
            $student->addMedia(storage_path('tmp/uploads/' . $request->input('signature')))->toMediaCollection('signature');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $student->id]);
        }

        return redirect()->route('admin.students.index');
    }

    public function edit(Student $student)
    {
        abort_if(Gate::denies('student_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degrees = Degree::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $batches = Batch::all()->pluck('batch_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $student->load('degree', 'batch', 'user');

        return view('admin.students.edit', compact('degrees', 'batches', 'student'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->all());

        if ($request->input('id_proof', false)) {
            if (!$student->id_proof || $request->input('id_proof') !== $student->id_proof->file_name) {
                if ($student->id_proof) {
                    $student->id_proof->delete();
                }

                $student->addMedia(storage_path('tmp/uploads/' . $request->input('id_proof')))->toMediaCollection('id_proof');
            }
        } elseif ($student->id_proof) {
            $student->id_proof->delete();
        }

        if ($request->input('photo', false)) {
            if (!$student->photo || $request->input('photo') !== $student->photo->file_name) {
                if ($student->photo) {
                    $student->photo->delete();
                }

                $student->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($student->photo) {
            $student->photo->delete();
        }

        if ($request->input('signature', false)) {
            if (!$student->signature || $request->input('signature') !== $student->signature->file_name) {
                if ($student->signature) {
                    $student->signature->delete();
                }

                $student->addMedia(storage_path('tmp/uploads/' . $request->input('signature')))->toMediaCollection('signature');
            }
        } elseif ($student->signature) {
            $student->signature->delete();
        }

        return redirect()->route('admin.students.index');
    }

    public function show(Student $student)
    {
        abort_if(Gate::denies('student_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student->load('degree', 'batch', 'user', 'studentFees', 'studentInstalments', 'studentInvoices');

        return view('admin.students.show', compact('student'));
    }

    public function destroy(Student $student)
    {
        abort_if(Gate::denies('student_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student->delete();

        return back();
    }

    public function massDestroy(MassDestroyStudentRequest $request)
    {
        Student::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('student_create') && Gate::denies('student_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Student();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
