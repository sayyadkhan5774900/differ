<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyNoticeboardRequest;
use App\Http\Requests\StoreNoticeboardRequest;
use App\Http\Requests\UpdateNoticeboardRequest;
use App\Models\Noticeboard;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class NoticeboardController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('noticeboard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $noticeboards = Noticeboard::with(['media'])->get();

        return view('frontend.noticeboards.index', compact('noticeboards'));
    }

    public function create()
    {
        abort_if(Gate::denies('noticeboard_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.noticeboards.create');
    }

    public function store(StoreNoticeboardRequest $request)
    {
        $noticeboard = Noticeboard::create($request->all());

        if ($request->input('attachment', false)) {
            $noticeboard->addMedia(storage_path('tmp/uploads/' . $request->input('attachment')))->toMediaCollection('attachment');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $noticeboard->id]);
        }

        return redirect()->route('frontend.noticeboards.index');
    }

    public function edit(Noticeboard $noticeboard)
    {
        abort_if(Gate::denies('noticeboard_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.noticeboards.edit', compact('noticeboard'));
    }

    public function update(UpdateNoticeboardRequest $request, Noticeboard $noticeboard)
    {
        $noticeboard->update($request->all());

        if ($request->input('attachment', false)) {
            if (!$noticeboard->attachment || $request->input('attachment') !== $noticeboard->attachment->file_name) {
                if ($noticeboard->attachment) {
                    $noticeboard->attachment->delete();
                }

                $noticeboard->addMedia(storage_path('tmp/uploads/' . $request->input('attachment')))->toMediaCollection('attachment');
            }
        } elseif ($noticeboard->attachment) {
            $noticeboard->attachment->delete();
        }

        return redirect()->route('frontend.noticeboards.index');
    }

    public function show(Noticeboard $noticeboard)
    {
        abort_if(Gate::denies('noticeboard_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.noticeboards.show', compact('noticeboard'));
    }

    public function destroy(Noticeboard $noticeboard)
    {
        abort_if(Gate::denies('noticeboard_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $noticeboard->delete();

        return back();
    }

    public function massDestroy(MassDestroyNoticeboardRequest $request)
    {
        Noticeboard::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('noticeboard_create') && Gate::denies('noticeboard_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Noticeboard();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
