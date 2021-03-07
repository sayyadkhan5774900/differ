<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStudyMaterialRequest;
use App\Http\Requests\StoreStudyMaterialRequest;
use App\Http\Requests\UpdateStudyMaterialRequest;
use App\Models\StudyMaterial;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class StudyMaterialController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('study_material_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studyMaterials = StudyMaterial::with(['media'])->get();

        return view('frontend.studyMaterials.index', compact('studyMaterials'));
    }

    public function create()
    {
        abort_if(Gate::denies('study_material_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.studyMaterials.create');
    }

    public function store(StoreStudyMaterialRequest $request)
    {
        $studyMaterial = StudyMaterial::create($request->validated());

        foreach ($request->input('file', []) as $file) {
            $studyMaterial->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $studyMaterial->id]);
        }

        return redirect()->route('frontend.study-materials.index');
    }

    public function edit(StudyMaterial $studyMaterial)
    {
        abort_if(Gate::denies('study_material_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.studyMaterials.edit', compact('studyMaterial'));
    }

    public function update(UpdateStudyMaterialRequest $request, StudyMaterial $studyMaterial)
    {
        $studyMaterial->update($request->validated());

        if (count($studyMaterial->file) > 0) {
            foreach ($studyMaterial->file as $media) {
                if (!in_array($media->file_name, $request->input('file', []))) {
                    $media->delete();
                }
            }
        }

        $media = $studyMaterial->file->pluck('file_name')->toArray();

        foreach ($request->input('file', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $studyMaterial->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('file');
            }
        }

        return redirect()->route('frontend.study-materials.index');
    }

    public function show(StudyMaterial $studyMaterial)
    {
        abort_if(Gate::denies('study_material_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.studyMaterials.show', compact('studyMaterial'));
    }

    public function destroy(StudyMaterial $studyMaterial)
    {
        abort_if(Gate::denies('study_material_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studyMaterial->delete();

        return back();
    }

    public function massDestroy(MassDestroyStudyMaterialRequest $request)
    {
        StudyMaterial::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('study_material_create') && Gate::denies('study_material_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new StudyMaterial();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
