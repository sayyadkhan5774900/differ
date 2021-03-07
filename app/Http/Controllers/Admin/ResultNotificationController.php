<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Notification;
use App\Models\Student;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResultNotificationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('result_notification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        abort_if(Gate::denies('notification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notifications = Notification::with(['batch', 'student', 'media'])->where('type','result')->get();

        return view('admin.resultNotifications.index', compact('notifications'));
    }

    public function create()
    {
        abort_if(Gate::denies('notification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $batches = Batch::all()->pluck('batch_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.resultNotifications.create', compact('batches', 'students'));
    }
}
