<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTeamMemeberRequest;
use App\Http\Requests\StoreTeamMemeberRequest;
use App\Http\Requests\UpdateTeamMemeberRequest;
use App\Models\TeamMemeber;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TeamMemeberController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('team_memeber_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teamMemebers = TeamMemeber::with(['media'])->get();

        return view('frontend.teamMemebers.index', compact('teamMemebers'));
    }

    public function create()
    {
        abort_if(Gate::denies('team_memeber_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.teamMemebers.create');
    }

    public function store(StoreTeamMemeberRequest $request)
    {
        $teamMemeber = TeamMemeber::create($request->all());

        if ($request->input('image', false)) {
            $teamMemeber->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $teamMemeber->id]);
        }

        return redirect()->route('frontend.team-memebers.index');
    }

    public function edit(TeamMemeber $teamMemeber)
    {
        abort_if(Gate::denies('team_memeber_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.teamMemebers.edit', compact('teamMemeber'));
    }

    public function update(UpdateTeamMemeberRequest $request, TeamMemeber $teamMemeber)
    {
        $teamMemeber->update($request->all());

        if ($request->input('image', false)) {
            if (!$teamMemeber->image || $request->input('image') !== $teamMemeber->image->file_name) {
                if ($teamMemeber->image) {
                    $teamMemeber->image->delete();
                }

                $teamMemeber->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($teamMemeber->image) {
            $teamMemeber->image->delete();
        }

        return redirect()->route('frontend.team-memebers.index');
    }

    public function show(TeamMemeber $teamMemeber)
    {
        abort_if(Gate::denies('team_memeber_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.teamMemebers.show', compact('teamMemeber'));
    }

    public function destroy(TeamMemeber $teamMemeber)
    {
        abort_if(Gate::denies('team_memeber_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teamMemeber->delete();

        return back();
    }

    public function massDestroy(MassDestroyTeamMemeberRequest $request)
    {
        TeamMemeber::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('team_memeber_create') && Gate::denies('team_memeber_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TeamMemeber();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
