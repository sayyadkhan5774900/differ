@extends('layouts.landing')
@section('content')

<div class="container my-5 py-5">
    
   <div class="row">
    @if(session('message'))
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">{{ session('message') }}</div>
            </div>
        </div>
    </div>
@endif
   </div>

    <div class="row">
        <div class="col-sm-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                    aria-controls="v-pills-home" aria-selected="true">Home</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                    aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                <a class="nav-link" id="v-pills-notice_board-tab" data-toggle="pill" href="#v-pills-notice_board"
                    role="tab" aria-controls="v-pills-notice_board" aria-selected="false">Notice Board</a>
                <a class="nav-link" id="v-pills-study-material-tab" data-toggle="pill" href="#v-pills-study-material"
                    role="tab" aria-controls="v-pills-study-material" aria-selected="false">Study Material</a>
                <a class="nav-link" id="v-pills-attendence-notification-tab" data-toggle="pill" href="#v-pills-attendence-notification" role="tab"
                    aria-controls="v-pills-attendence-notification" aria-selected="false">Attendence Notification</a>
                <a class="nav-link" id="v-pills-date-sheet-notification-tab" data-toggle="pill" href="#v-pills-date-sheet-notification" role="tab"
                    aria-controls="v-pills-date-sheet-notification" aria-selected="false">Date Sheet Notification</a>
                <a class="nav-link" id="v-pills-result-notification-tab" data-toggle="pill" href="#v-pills-result-notification" role="tab"
                    aria-controls="v-pills-result-notification" aria-selected="false">Result Notification</a>
                {{-- <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
                    aria-controls="v-pills-settings" aria-selected="false">Settings</a> --}}
                <a class="nav-link" id="v-pills-password-tab" data-toggle="pill" href="#v-pills-password" role="tab"
                    aria-controls="v-pills-password" aria-selected="false">Change Password</a>
            </div>
        </div>

        <div class="col-sm-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                    aria-labelledby="v-pills-home-tab">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="section-title" data-aos="zoom-out">
                                <p style="color: rgb(29, 29, 88);">{{$student->first_name.' '.$student->last_name}}</p>
                            </div>
                            <div class="h3 {{ $student->is_active == 'active' ? 'text-success' : 'text-danger'}}">
                                {{ '( '.App\Models\Student::IS_ACTIVE_SELECT[$student->is_active].' )' ?? '' }}
                            </div>
                        </div>
                        <div class="col-sm-4 justify-content-center text-center">
                            @if ($student)
                            @if($student->photo)
                            <a href="{{ $student->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                <img width="200px" height="200px" src="{{ $student->photo->getUrl() }}">
                            </a>
                            @endif
                            @else
                            <img width="200px" height="200px" src="{{ asset('img/avatar.png') }}" alt="">
                            @endif

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                    aria-labelledby="v-pills-profile-tab">
                    
                    <div class="section-title" data-aos="zoom-out">
                        <p style="color: rgb(29, 29, 88);">Profile</p>
                    </div>

                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.degree') }}
                                </th>
                                <td>
                                    {{ $student->degree->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.batch') }}
                                </th>
                                <td>
                                    {{ $student->batch->batch_code ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.gender') }}
                                </th>
                                <td>
                                    {{ App\Models\Student::GENDER_RADIO[$student->gender] ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.date_of_birth') }}
                                </th>
                                <td>
                                    {{ $student->date_of_birth }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.father_name') }}
                                </th>
                                <td>
                                    {{ $student->father_name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.mother_name') }}
                                </th>
                                <td>
                                    {{ $student->mother_name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.address') }}
                                </th>
                                <td>
                                    {!! $student->address !!}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.city') }}
                                </th>
                                <td>
                                    {{ $student->city }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.zip_code') }}
                                </th>
                                <td>
                                    {{ $student->zip_code }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.state') }}
                                </th>
                                <td>
                                    {{ $student->state }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.nationality') }}
                                </th>
                                <td>
                                    {{ $student->nationality }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.phone') }}
                                </th>
                                <td>
                                    {{ $student->phone }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.email') }}
                                </th>
                                <td>
                                    {{ $student->email }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.qualification') }}
                                </th>
                                <td>
                                    {{ $student->qualification }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.id_proof') }}
                                </th>
                                <td>
                                    @if($student->id_proof)
                                    <a href="{{ $student->id_proof->getUrl() }}" target="_blank"
                                        style="display: inline-block">
                                        <img src="{{ $student->id_proof->getUrl('thumb') }}">
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.signature') }}
                                </th>
                                <td>
                                    @if($student->signature)
                                    <a href="{{ $student->signature->getUrl() }}" target="_blank"
                                        style="display: inline-block">
                                        <img src="{{ $student->signature->getUrl('thumb') }}">
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.registration_no') }}
                                </th>
                                <td>
                                    {{ $student->registration_no }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.registration_date') }}
                                </th>
                                <td>
                                    {{ $student->registration_date }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.user') }}
                                </th>
                                <td>
                                    {{ $student->user->email ?? '' }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade faq-profile"  id="v-pills-notice_board" role="tabpanel"
                    aria-labelledby="v-pills-notice_board-tab">
                    
                    <div class="section-title" data-aos="zoom-out">
                        <p style="color: rgb(29, 29, 88);">University Noticeboard</p>
                    </div>

                    <ul class="faq-list">
                        @foreach ($noticeboards as $noticeboard)
                        <li class="mb-3">
                            <a data-toggle="collapse" href="#{{'faq2'.$loop->iteration}}" class="collapsed">{{$noticeboard->title}}<i
                                    class="icofont-simple-up"></i></a>
                            <div id="{{'faq2'.$loop->iteration}}" class="collapse {{ $loop->iteration == 1 ? 'show' : ''}}"
                                data-parent=".faq-list">
                                <p>
                                    {!! date('d-M-y', strtotime($noticeboard->created_at)) !!}
                                </p>
                                <p>
                                    {!!$noticeboard->body!!}
                                </p>
                                <div class="mb-3">
                                    @if ($noticeboard->link_to == 'url')
                                @if ($noticeboard->url)
                                <div class="float-right">
                                    <a href="{{$noticeboard->url}}">{{ trans('global.read_more') }}</a>
                                </div>
                                @endif
                                @endif
                
                                @if ($noticeboard->link_to == 'attachment')
                                @if($noticeboard->attachment)
                                <div class="float-right">
                                    <a href=" {{ route('noticeboard.download', $noticeboard->id) }}" target="_blank">
                                        {{ trans('global.downloadFile') }}
                                    </a>
                                </div>
                                @endif
                                @endif
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                

                </div>
                <div class="tab-pane fade" id="v-pills-study-material" role="tabpanel"
                    aria-labelledby="v-pills-study-material-tab">

                    <div class="section-title" data-aos="zoom-out">
                        <p style="color: rgb(29, 29, 88);">Profile</p>
                    </div>
                    <div>
                        @foreach ($materials as $material)
                           <div class="mb-4 p-4 card">
                                <h3>{!! $material->title !!}</h3>
                                <p>{!! $material->description !!}</p>
                                @if($material->file)
                                <div class="float-right">
                                <a href=" {{ route('material.download', $material->id) }}" target="_blank">
                                    {{ trans('global.downloadFile') }}
                                </a>
                                </div>
                                @endif
                           </div>
                        @endforeach
                    </div>

                </div>
                <div class="tab-pane fade faq-profile" id="v-pills-attendence-notification" role="tabpanel"
                    aria-labelledby="v-pills-attendence-notification-tab">
                    
                    <div class="section-title" data-aos="zoom-out">
                        <p style="color: rgb(29, 29, 88);">Attendences Notifications</p>
                    </div>

                    
                    <div class="section-title-2 mb-2" data-aos="zoom-out">
                        <p style="color: rgb(29, 29, 88);">Personal</p>
                    </div>

                    @isset($attendencesNotificationsPersonal)
                    <ul class="faq-list">
                        @foreach ($attendencesNotificationsPersonal as $notification)
                        <li class="mb-3">
                            <a data-toggle="collapse" href="#{{'faq2'.$loop->iteration}}" class="collapsed">{{$notification->title}}<i
                                    class="icofont-simple-up"></i></a>
                            <div id="{{'faq2'.$loop->iteration}}" class="collapse {{ $loop->iteration == 1 ? 'show' : ''}}"
                                data-parent=".faq-list">
                                <p>
                                    {!! date('d-M-y', strtotime($notification->created_at)) !!} &nbsp; &nbsp; <em>(For All Batch)</em>
                                </p>
                                <p>
                                    {!!$notification->description !!}
                                </p>
                                <div class="mb-3">
                        
                                @if($notification->attachment)
                                <div class="float-right">
                                    <a href=" {{ route('notification.download', $notification->id) }}" target="_blank">
                                        {{ trans('global.downloadFile') }}
                                    </a>
                                </div>
                                @endif
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endisset


                    <div class="section-title-2 mb-2" data-aos="zoom-out">
                        <p style="color: rgb(29, 29, 88);">For All Bacth</p>
                    </div>

                    @isset($attendencesNotifications)
                    <ul class="faq-list">
                        @foreach ($attendencesNotifications as $notification)
                        <li class="mb-3">
                            <a data-toggle="collapse" href="#{{'faq2'.$loop->iteration}}" class="collapsed">{{$notification->title}}<i
                                    class="icofont-simple-up"></i></a>
                            <div id="{{'faq2'.$loop->iteration}}" class="collapse {{ $loop->iteration == 1 ? 'show' : ''}}"
                                data-parent=".faq-list">
                                <p>
                                    {!! date('d-M-y', strtotime($notification->created_at)) !!} &nbsp; &nbsp; <em>(For All Batch)</em>
                                </p>
                                <p>
                                    {!!$notification->description !!}
                                </p>
                                <div class="mb-3">
                        
                                @if($notification->attachment)
                                <div class="float-right">
                                    <a href=" {{ route('notification.download', $notification->id) }}" target="_blank">
                                        {{ trans('global.downloadFile') }}
                                    </a>
                                </div>
                                @endif
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endisset

                </div>
                <div class="tab-pane fade faq-profile" id="v-pills-result-notification" role="tabpanel"
                    aria-labelledby="v-pills-result-notification-tab">

                    <div class="section-title" data-aos="zoom-out">
                        <p style="color: rgb(29, 29, 88);">Results Notifications</p>
                    </div>

                    
                    <div class="section-title-2 mb-2" data-aos="zoom-out">
                        <p style="color: rgb(29, 29, 88);">Personal</p>
                    </div>

                    @isset($resultsNotificationsPersonal)
                    <ul class="faq-list">
                        @foreach ($resultsNotificationsPersonal as $notification)
                        <li class="mb-3">
                            <a data-toggle="collapse" href="#{{'faq2'.$loop->iteration}}" class="collapsed">{{$notification->title}}<i
                                    class="icofont-simple-up"></i></a>
                            <div id="{{'faq2'.$loop->iteration}}" class="collapse {{ $loop->iteration == 1 ? 'show' : ''}}"
                                data-parent=".faq-list">
                                <p>
                                    {!! date('d-M-y', strtotime($notification->created_at)) !!} &nbsp; &nbsp; <em>(For All Batch)</em>
                                </p>
                                <p>
                                    {!!$notification->description !!}
                                </p>
                                <div class="mb-3">
                        
                                @if($notification->attachment)
                                <div class="float-right">
                                    <a href=" {{ route('notification.download', $notification->id) }}" target="_blank">
                                        {{ trans('global.downloadFile') }}
                                    </a>
                                </div>
                                @endif
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endisset


                    <div class="section-title-2 mb-2" data-aos="zoom-out">
                        <p style="color: rgb(29, 29, 88);">For All Bacth</p>
                    </div>

                    @isset($resultsNotifications)
                    <ul class="faq-list">
                        @foreach ($resultsNotifications as $notification)
                        <li class="mb-3">
                            <a data-toggle="collapse" href="#{{'faq2'.$loop->iteration}}" class="collapsed">{{$notification->title}}<i
                                    class="icofont-simple-up"></i></a>
                            <div id="{{'faq2'.$loop->iteration}}" class="collapse {{ $loop->iteration == 1 ? 'show' : ''}}"
                                data-parent=".faq-list">
                                <p>
                                    {!! date('d-M-y', strtotime($notification->created_at)) !!} &nbsp; &nbsp; <em>(For All Batch)</em>
                                </p>
                                <p>
                                    {!!$notification->description !!}
                                </p>
                                <div class="mb-3">
                        
                                @if($notification->attachment)
                                <div class="float-right">
                                    <a href=" {{ route('notification.download', $notification->id) }}" target="_blank">
                                        {{ trans('global.downloadFile') }}
                                    </a>
                                </div>
                                @endif
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endisset

                </div>
                <div class="tab-pane fade faq-profile" id="v-pills-date-sheet-notification" role="tabpanel"
                    aria-labelledby="v-pills-date-sheet-notification-tab">

                    <div class="section-title" data-aos="zoom-out">
                        <p style="color: rgb(29, 29, 88);">Date Sheets Notifications</p>
                    </div>

                    
                    <div class="section-title-2 mb-2" data-aos="zoom-out">
                        <p style="color: rgb(29, 29, 88);">Personal</p>
                    </div>

                    @isset($dateSheetsNotificationsPersonal)
                    <ul class="faq-list">
                        @foreach ($dateSheetsNotificationsPersonal as $notification)
                        <li class="mb-3">
                            <a data-toggle="collapse" href="#{{'faq2'.$loop->iteration}}" class="collapsed">{{$notification->title}}<i
                                    class="icofont-simple-up"></i></a>
                            <div id="{{'faq2'.$loop->iteration}}" class="collapse {{ $loop->iteration == 1 ? 'show' : ''}}"
                                data-parent=".faq-list">
                                <p>
                                    {!! date('d-M-y', strtotime($notification->created_at)) !!} &nbsp; &nbsp; <em>(For All Batch)</em>
                                </p>
                                <p>
                                    {!!$notification->description !!}
                                </p>
                                <div class="mb-3">
                        
                                @if($notification->attachment)
                                <div class="float-right">
                                    <a href=" {{ route('notification.download', $notification->id) }}" target="_blank">
                                        {{ trans('global.downloadFile') }}
                                    </a>
                                </div>
                                @endif
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endisset


                    <div class="section-title-2 mb-2" data-aos="zoom-out">
                        <p style="color: rgb(29, 29, 88);">For All Bacth</p>
                    </div>

                    @isset($dateSheetsNotifications)
                    <ul class="faq-list">
                        @foreach ($dateSheetsNotifications as $notification)
                        <li class="mb-3">
                            <a data-toggle="collapse" href="#{{'faq2'.$loop->iteration}}" class="collapsed">{{$notification->title}}<i
                                    class="icofont-simple-up"></i></a>
                            <div id="{{'faq2'.$loop->iteration}}" class="collapse {{ $loop->iteration == 1 ? 'show' : ''}}"
                                data-parent=".faq-list">
                                <p>
                                    {!! date('d-M-y', strtotime($notification->created_at)) !!} &nbsp; &nbsp; <em>(For All Batch)</em>
                                </p>
                                <p>
                                    {!!$notification->description !!}
                                </p>
                                <div class="mb-3">
                        
                                @if($notification->attachment)
                                <div class="float-right">
                                    <a href=" {{ route('notification.download', $notification->id) }}" target="_blank">
                                        {{ trans('global.downloadFile') }}
                                    </a>
                                </div>
                                @endif
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endisset

                </div>
                {{-- <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                    aria-labelledby="v-pills-settings-tab">Setting
                </div> --}}
                <div class="tab-pane fade" id="v-pills-password" role="tabpanel"
                    aria-labelledby="v-pills-password-tab">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    {{ trans('global.change_password') }}
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route("student.password") }}">
                                        @csrf
                                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                            <label class="required" for="password">New
                                                {{ trans('cruds.user.fields.password') }}</label>
                                            <input class="form-control" type="password" name="password"
                                                id="password" required>
                                            @if($errors->has('password'))
                                            <span class="help-block"
                                                role="alert">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="required" for="password_confirmation">Repeat New
                                                {{ trans('cruds.user.fields.password') }}</label>
                                            <input class="form-control" type="password" name="password_confirmation"
                                                id="password_confirmation" required>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-danger" type="submit">
                                                {{ trans('global.save') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection