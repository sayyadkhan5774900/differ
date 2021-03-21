<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\ContentPage;
use App\Models\HomeSlider;
use App\Models\Noticeboard;
use App\Models\Notification;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Student;
use App\Models\StudyMaterial;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\Support\MediaStream;
use Symfony\Component\HttpFoundation\Response;



class LandingController extends Controller
{
    public function landing()
    {
        $sliders = HomeSlider::all();

        $services = Service::all();

        $testimonials = Testimonial::all();

        $settings = Setting::pluck('value', 'key');

        return view('frontend.landing',compact(['sliders','services','testimonials','settings']));
    }

    public function noticeboardDownload($id)
    {
        $noticeboard = Noticeboard::with(['media'])->find($id);
        return response()->download($noticeboard->attachment->getPath());
    }
   
    public function notificationDownload($id)
    {
        $notification = Notification::with(['media'])->find($id);

        $attachment = $notification->getMedia('attachment');

        return MediaStream::create('notification.zip')->addMedia($attachment);

        // return response()->download($notification->attachment->getPath());
    }
   
    public function materialDownload($id)
    {
        $material = StudyMaterial::with(['media'])->find($id);

        $files = $material->getMedia('file');

        return MediaStream::create('my-files.zip')->addMedia($files);

        dd($material->file);
        return response()->download($material->file->getPath());
    }
   
    public function post($id)
    {
        $post = ContentPage::find($id);

        return view('frontend/post', compact('post'));
    }
  
    public function materials()
    {
        $materials = StudyMaterial::simplePaginate(10);

        return view('frontend/study_materials', compact('materials'));
    }

    public function blog()
    {
        return view('frontend/blog');
    }

    public function events()
    {
        return view('frontend/events');
    }

    public function profile()
    {
        abort_if(Gate::denies('student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $student = Auth::user()->student;
        
        // $student = Auth::user()->student->with(['degree', 'batch', 'user', 'media'])->get();

        $noticeboards = Noticeboard::all();

        $materials = StudyMaterial::all();

        $resultsNotifications = Notification::where('batch_id',$student->batch->id)
                                              ->where('type','result')->get(); 
        $attendencesNotifications = Notification::where('batch_id',$student->batch->id)
                                              ->where('type','attendence')->get(); 
        $dateSheetsNotifications = Notification::where('batch_id',$student->batch->id)
                                              ->where('type','date_sheet')->get(); 
      
      
        $resultsNotificationsPersonal = Notification::where('student_id',$student->id)
                                              ->where('type','result')->get(); 
        $attendencesNotificationsPersonal = Notification::where('student_id',$student->id)
                                              ->where('type','attendence')->get(); 
        $dateSheetsNotificationsPersonal = Notification::where('student_id',$student->id)
                                              ->where('type','date_sheet')->get(); 

        return view('frontend.student_profile', compact('student','noticeboards','materials','dateSheetsNotifications','attendencesNotifications','resultsNotifications','dateSheetsNotificationsPersonal','attendencesNotificationsPersonal','resultsNotificationsPersonal'));
    }

    public function password(Request $request)
    {

        $validated = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        auth()->user()->update($validated);

        return redirect()->route('student.profile')->with('message', __('global.change_password_success'));
    }

}
