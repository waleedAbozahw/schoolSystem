<!DOCTYPE html>
<html lang="en">
@section('title')
{{trans('main_trans.Main_title')}}
@stop

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @include('layouts.head')
    @livewireStyles
</head>

<body style="font-family: 'Cairo', sans-serif">

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>

        <!--=================================
 preloader -->

        <!--=================================
student dashboard header start-->
        <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href="index.html"><img src="assets/images/logo-dark.png" alt=""></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-icon-dark.png" alt=""></a>
            </div>
            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                </li>

            </ul>
            <!-- select  language-->
            <ul class="nav navbar-nav ml-auto">
                <ul>
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                <li class="nav-item fullscreen">
                    <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="ti-bell"></i>
                        <span class="badge badge-danger notification-status"> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                        <div class="dropdown-header notifications">
                            <strong>Notifications</strong>
                            <span class="badge badge-pill badge-warning">05</span>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">New registered user <small class="float-right text-muted time">Just now</small> </a>
                        <a href="#" class="dropdown-item">New invoice received <small class="float-right text-muted time">22 mins</small> </a>
                        <a href="#" class="dropdown-item">Server error report<small class="float-right text-muted time">7 hrs</small> </a>
                        <a href="#" class="dropdown-item">Database report<small class="float-right text-muted time">1
                                days</small> </a>
                        <a href="#" class="dropdown-item">Order confirmation<small class="float-right text-muted time">2
                                days</small> </a>
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true"> <i class=" ti-view-grid"></i> </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-big">
                        <div class="dropdown-header">
                            <strong>Quick Links</strong>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="nav-grid">
                            <a href="#" class="nav-grid-item"><i class="ti-files text-primary"></i>
                                <h5>New Task</h5>
                            </a>
                            <a href="#" class="nav-grid-item"><i class="ti-check-box text-success"></i>
                                <h5>Assign Task</h5>
                            </a>
                        </div>
                        <div class="nav-grid">
                            <a href="#" class="nav-grid-item"><i class="ti-pencil-alt text-warning"></i>
                                <h5>Add Orders</h5>
                            </a>
                            <a href="#" class="nav-grid-item"><i class="ti-truck text-danger "></i>
                                <h5>New Orders</h5>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown mr-30">
                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <img src="assets/images/profile-avatar.jpg" alt="avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-0">{{auth()->user()->name}}</h5>
                                    <span>{{auth()->user()->email}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>


                        <a class="dropdown-item" href="{{route('profile.show')}}"><i class="text-warning ti-user"></i>Profile</a>

                        @if(auth('student')->check())
                        <form method="GET" action="{{ route('logout','student') }}">
                            @elseif(auth('teacher')->check())
                            <form method="GET" action="{{ route('logout','teacher') }}">
                                @elseif(auth('parent')->check())
                                <form method="GET" action="{{ route('logout','parent') }}">
                                    @else
                                    <form method="GET" action="{{ route('logout','web') }}">
                                        @endif

                                        @csrf
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault();this.closest('form').submit();"><i class="bx bx-log-out"></i>تسجيل الخروج</a>
                                    </form>

                    </div>
                </li>
            </ul>
        </nav>

        <!--=================================
 header End-->


        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif"> {{trans('Teacher_trans.welcome')}} : {{auth()->user()->Name}}</h4>
                    </div><br><br>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fa fa-graduation-cap highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{trans('Teacher_trans.students_number')}}</p>
                                    <h4>{{$student_count}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('students_teacher')}}" target="_blank"><span class="text-danger">{{trans('Teacher_trans.show_data')}}</span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fa fa-bars highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{trans('Teacher_trans.classes_number')}}</p>
                                    <h4>{{$sections_count}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('sections')}}" target="_blank"><span class="text-danger">{{trans('Teacher_trans.show_data')}}</span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Orders Status widgets-->


            <div class="row">

                <div style="height: 400px;" class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h5 style="font-family: 'Cairo', sans-serif" class="card-title">{{trans('Teacher_trans.latest_processes_on_system')}}</h5>
                                    </div>
                                    <div class="d-block d-md-flex nav-tabs-custom">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                                            <li class="nav-item">
                                                <a class="nav-link active show" id="students-tab" data-toggle="tab" href="#students" role="tab" aria-controls="students" aria-selected="true"> {{trans('Teacher_trans.students')}}</a>
                                            </li>



                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent">

                                    {{--students Table--}}
                                    <div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="students-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                    <tr class="table-info text-danger">
                                                        <th>#</th>
                                                        <th>{{trans('Teacher_trans.student_name')}}</th>
                                                        <th>{{trans('Teacher_trans.email')}}</th>
                                                        <th>{{trans('Teacher_trans.gender')}}</th>
                                                        <th>{{trans('Teacher_trans.grade')}}</th>
                                                        <th>{{trans('Teacher_trans.classroom')}}</th>
                                                        <th>{{trans('Teacher_trans.section')}}</th>
                                                        <th>{{trans('Teacher_trans.addition_date')}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse(\App\Models\Student::latest()->take(5)->get() as $student)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$student->name}}</td>
                                                        <td>{{$student->email}}</td>
                                                        <td>{{$student->gender->Name}}</td>
                                                        <td>{{$student->grade->Name}}</td>
                                                        <td>{{$student->classroom->Name_Class}}</td>
                                                        <td>{{$student->section->Name_Section}}</td>
                                                        <td class="text-success">{{$student->created_at}}</td>
                                                        @empty
                                                        <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{--teachers Table--}}
                                    <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                    <tr class="table-info text-danger">
                                                        <th>#</th>
                                                        <th>اسم المعلم</th>
                                                        <th>النوع</th>
                                                        <th>تاريخ التعين</th>
                                                        <th>التخصص</th>
                                                        <th>تاريخ الاضافة</th>
                                                    </tr>
                                                </thead>

                                                @forelse(\App\Models\Teacher::latest()->take(5)->get() as $teacher)
                                                <tbody>
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$teacher->Name}}</td>
                                                        <td>{{$teacher->genders->Name}}</td>
                                                        <td>{{$teacher->Joining_Date}}</td>
                                                        <td>{{$teacher->specializations->Name}}</td>
                                                        <td class="text-success">{{$teacher->created_at}}</td>
                                                        @empty
                                                        <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                                    </tr>
                                                </tbody>
                                                @endforelse
                                            </table>
                                        </div>
                                    </div>

                                    {{--parents Table--}}
                                    <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                    <tr class="table-info text-danger">
                                                        <th>#</th>
                                                        <th>اسم ولي الامر</th>
                                                        <th>البريد الالكتروني</th>
                                                        <th>رقم الهوية</th>
                                                        <th>رقم الهاتف</th>
                                                        <th>تاريخ الاضافة</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse(\App\Models\MyParent::latest()->take(5)->get() as $parent)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$parent->Name_Father}}</td>
                                                        <td>{{$parent->email}}</td>
                                                        <td>{{$parent->National_ID_Father}}</td>
                                                        <td>{{$parent->Phone_Father}}</td>
                                                        <td class="text-success">{{$parent->created_at}}</td>
                                                        @empty
                                                        <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{--sections Table--}}
                                    <div class="tab-pane fade" id="fee_invoices" role="tabpanel" aria-labelledby="fee_invoices-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                    <tr class="table-info text-danger">
                                                        <th>#</th>
                                                        <th>تاريخ الفاتورة</th>
                                                        <th>اسم الطالب</th>
                                                        <th>المرحلة الدراسية</th>
                                                        <th>الصف الدراسي</th>
                                                        <th>القسم</th>
                                                        <th>نوع الرسوم</th>
                                                        <th>المبلغ</th>
                                                        <th>تاريخ الاضافة</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse(\App\Models\Fee_invoice::latest()->take(10)->get() as $section)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$section->invoice_date}}</td>
                                                        <td>{{$section->classroom->Name_Class}}</td>
                                                        <td class="text-success">{{$section->created_at}}</td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td class="alert-danger" colspan="9">لاتوجد بيانات</td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <livewire:calendar />

            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')
    @livewireScripts
    @stack('scripts')
</body>

</html>
