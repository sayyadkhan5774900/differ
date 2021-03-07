<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTeamMemeberRequest;
use App\Http\Requests\UpdateTeamMemeberRequest;
use App\Http\Resources\Admin\TeamMemeberResource;
use App\Models\TeamMemeber;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamMemeberApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('team_memeber_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TeamMemeberResource(TeamMemeber::all());
    }

    public function store(StoreTeamMemeberRequest $request)
    {
        $teamMemeber = TeamMemeber::create($request->all());

        if ($request->input('image', false)) {
            $teamMemeber->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        return (new TeamMemeberResource($teamMemeber))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TeamMemeber $teamMemeber)
    {
        abort_if(Gate::denies('team_memeber_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TeamMemeberResource($teamMemeber);
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

        return (new TeamMemeberResource($teamMemeber))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TeamMemeber $teamMemeber)
    {
        abort_if(Gate::denies('team_memeber_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teamMemeber->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
