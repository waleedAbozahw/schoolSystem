<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('/teacher/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.Programname')}} </li>

        <!-- الاقسام-->
        <li>
            <a href="{{route('sections')}}" target="_blank"><i class="fa fa-bars"></i><span
                    class="right-nav-text">{{trans('Teacher_trans.sections')}}</span></a>
        </li>

        <!-- الطلاب-->
        <li>
            <a href="{{route('students_teacher')}}" target="blank"><i class="fa fa-graduation-cap"></i><span
                    class="right-nav-text">{{trans('Teacher_trans.students')}}</span></a>
        </li>

        <!-- الاختبارات-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                <div class="pull-left"><i class="fa fa-pencil"></i><span
                        class="right-nav-text">{{trans('Teacher_trans.quizzes')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('quizzes.index')}}">{{trans('Teacher_trans.quizzes')}}</a></li>
                <li><a href="{{route('get_questions')}}">{{trans('Teacher_trans.questions')}}</a></li>

            </ul>

        </li>


        <!-- Online classes-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                <div class="pull-left"><i class="fa fa-file-video-o"></i><span class="right-nav-text">{{trans('main_trans.Onlineclasses')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('online_zoom_classes.index')}}">{{trans('Teacher_trans.zoom_classes')}}</a> </li>
            </ul>
        </li>



        <!-- sections-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu1">
                <div class="pull-left"><i class="fa fa-pencil"></i><span
                        class="right-nav-text">{{trans('Teacher_trans.reports')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="sections-menu1" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('attendance_report')}}">{{trans('Teacher_trans.attendance_report')}}</a></li>
            </ul>

        </li>

        <!-- الملف الشخصي-->
        <li>
            <a href="{{route('profile.show')}}"><i class="fa fa-user"></i><span
                    class="right-nav-text">{{trans('Teacher_trans.profile')}}</span></a>
        </li>

    </ul>
</div>
