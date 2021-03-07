<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHomeSliderRequest;
use App\Http\Requests\UpdateHomeSliderRequest;
use App\Http\Resources\Admin\HomeSliderResource;
use App\Models\HomeSlider;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeSliderApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('home_slider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HomeSliderResource(HomeSlider::all());
    }

    public function store(StoreHomeSliderRequest $request)
    {
        $homeSlider = HomeSlider::create($request->all());

        return (new HomeSliderResource($homeSlider))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(HomeSlider $homeSlider)
    {
        abort_if(Gate::denies('home_slider_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HomeSliderResource($homeSlider);
    }

    public function update(UpdateHomeSliderRequest $request, HomeSlider $homeSlider)
    {
        $homeSlider->update($request->all());

        return (new HomeSliderResource($homeSlider))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(HomeSlider $homeSlider)
    {
        abort_if(Gate::denies('home_slider_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homeSlider->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
