<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFeeRequest;
use App\Http\Requests\StoreFeeRequest;
use App\Http\Requests\UpdateFeeRequest;
use App\Models\Fee;
use App\Models\Student;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FeeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fees = Fee::with(['student'])->get();

        return view('admin.fees.index', compact('fees'));
    }

    public function create()
    {
        abort_if(Gate::denies('fee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = Student::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.fees.create', compact('students'));
    }

    public function store(StoreFeeRequest $request)
    {
        $fee = Fee::create($request->all());

        return redirect()->route('admin.fees.index');
    }

    public function edit(Fee $fee)
    {
        abort_if(Gate::denies('fee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $students = Student::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fee->load('student');

        return view('admin.fees.edit', compact('students', 'fee'));
    }

    public function update(UpdateFeeRequest $request, Fee $fee)
    {
        $fee->update($request->all());

        return redirect()->route('admin.fees.index');
    }

    public function show(Fee $fee)
    {
        abort_if(Gate::denies('fee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fee->load('student');

        return view('admin.fees.show', compact('fee'));
    }

    public function destroy(Fee $fee)
    {
        abort_if(Gate::denies('fee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fee->delete();

        return back();
    }

    public function massDestroy(MassDestroyFeeRequest $request)
    {
        Fee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
