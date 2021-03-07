<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyNotificationRequest;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;
use App\Models\Batch;
use App\Models\Notification;
use App\Models\Student;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class NotificationController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('notification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notifications = Notification::with(['batch', 'student', 'media'])->get();

        return view('admin.notifications.index', compact('notifications'));
    }

    public function create()
    {
        abort_if(Gate::denies('notification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $batches = Batch::all()->pluck('batch_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.notifications.create', compact('batches', 'students'));
    }

    public function store(StoreNotificationRequest $request)
    {
        $notification = Notification::create($request->all());

        foreach ($request->input('attachment', []) as $file) {
            $notification->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachment');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $notification->id]);
        }

        if ($notification->type == 'attendance') {
            return redirect()->route('admin.attendance-notifications.index');
        }
        if ($notification->type == 'date_sheet') {
            return redirect()->route('admin.date-sheet-notifications.index');
        }
        if ($notification->type == 'result') {
            return redirect()->route('admin.result-notifications.index');
        }

    }

    public function edit(Notification $notification)
    {
        abort_if(Gate::denies('notification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $batches = Batch::all()->pluck('batch_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $students = Student::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $notification->load('batch', 'student');

        return view('admin.notifications.edit', compact('batches', 'students', 'notification'));
    }

    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        $notification->update($request->all());

        if (count($notification->attachment) > 0) {
            foreach ($notification->attachment as $media) {
                if (!in_array($media->file_name, $request->input('attachment', []))) {
                    $media->delete();
                }
            }
        }

        $media = $notification->attachment->pluck('file_name')->toArray();

        foreach ($request->input('attachment', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $notification->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachment');
            }
        }

        if ($notification->type == 'attendence') {
            return redirect()->route('admin.attendanceNotifications.index');
        }
        if ($notification->type == 'date-sheet') {
            return redirect()->route('admin.dateSheetNotifications.index');
        }
        if ($notification->type == 'result') {
            return redirect()->route('admin.resultNotifications.index');
        }
    }

    public function show(Notification $notification)
    {
        abort_if(Gate::denies('notification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notification->load('batch', 'student');

        return view('admin.notifications.show', compact('notification'));
    }

    public function destroy(Notification $notification)
    {
        abort_if(Gate::denies('notification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notification->delete();
        
        $type = $notification->type;

        if ($type == 'attendence') {
            return redirect()->route('admin.attendanceNotifications.index');
        }
        if ($type == 'date-sheet') {
            return redirect()->route('admin.dateSheetNotifications.index');
        }
        if ($type == 'result') {
            return redirect()->route('admin.resultNotifications.index');
        }
    }

    public function massDestroy(MassDestroyNotificationRequest $request)
    {
        Notification::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('notification_create') && Gate::denies('notification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Notification();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
