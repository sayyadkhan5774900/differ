<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDegreeRequest;
use App\Http\Requests\StoreDegreeRequest;
use App\Http\Requests\UpdateDegreeRequest;
use App\Models\Degree;
use App\Models\Subject;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DegreeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('degree_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degrees = Degree::with(['subjects'])->get();

        return view('admin.degrees.index', compact('degrees'));
    }

    public function create()
    {
        abort_if(Gate::denies('degree_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subjects = Subject::all()->pluck('name', 'id');

        return view('admin.degrees.create', compact('subjects'));
    }

    public function store(StoreDegreeRequest $request)
    {
        $degree = Degree::create($request->all());
        $degree->subjects()->sync($request->input('subjects', []));

        return redirect()->route('admin.degrees.index');
    }

    public function edit(Degree $degree)
    {
        abort_if(Gate::denies('degree_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subjects = Subject::all()->pluck('name', 'id');

        $degree->load('subjects');

        return view('admin.degrees.edit', compact('subjects', 'degree'));
    }

    public function update(UpdateDegreeRequest $request, Degree $degree)
    {
        $degree->update($request->all());
        $degree->subjects()->sync($request->input('subjects', []));

        return redirect()->route('admin.degrees.index');
    }

    public function show(Degree $degree)
    {
        abort_if(Gate::denies('degree_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degree->load('subjects', 'degreeBatches', 'degreeStudents');

        return view('admin.degrees.show', compact('degree'));
    }

    public function destroy(Degree $degree)
    {
        abort_if(Gate::denies('degree_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degree->delete();

        return back();
    }

    public function massDestroy(MassDestroyDegreeRequest $request)
    {
        Degree::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
