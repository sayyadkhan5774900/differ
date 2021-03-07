<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHomeSliderRequest;
use App\Http\Requests\StoreHomeSliderRequest;
use App\Http\Requests\UpdateHomeSliderRequest;
use App\Models\HomeSlider;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeSliderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('home_slider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homeSliders = HomeSlider::all();

        return view('admin.homeSliders.index', compact('homeSliders'));
    }

    public function create()
    {
        abort_if(Gate::denies('home_slider_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.homeSliders.create');
    }

    public function store(StoreHomeSliderRequest $request)
    {
        $homeSlider = HomeSlider::create($request->all());

        return redirect()->route('admin.home-sliders.index');
    }

    public function edit(HomeSlider $homeSlider)
    {
        abort_if(Gate::denies('home_slider_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.homeSliders.edit', compact('homeSlider'));
    }

    public function update(UpdateHomeSliderRequest $request, HomeSlider $homeSlider)
    {
        $homeSlider->update($request->all());

        return redirect()->route('admin.home-sliders.index');
    }

    public function show(HomeSlider $homeSlider)
    {
        abort_if(Gate::denies('home_slider_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.homeSliders.show', compact('homeSlider'));
    }

    public function destroy(HomeSlider $homeSlider)
    {
        abort_if(Gate::denies('home_slider_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homeSlider->delete();

        return back();
    }

    public function massDestroy(MassDestroyHomeSliderRequest $request)
    {
        HomeSlider::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
