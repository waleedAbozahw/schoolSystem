<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.Programname')}} </li>

        <!-- Grades-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                <div class="pull-left"><i class="fa fa-university"></i><span class="right-nav-text">{{trans('main_trans.Grades')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Grades.index')}}">{{trans('main_trans.Grades_list')}}</a></li>

            </ul>
        </li>
        <!-- classes-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                <div class="pull-left"><i class="fa fa-building"></i><span class="right-nav-text">{{trans('main_trans.classes')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Classrooms.index')}}">{{trans('main_trans.List_classes')}}</a></li>
            </ul>
        </li>


        <!-- sections-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                <div class="pull-left"><i class="fa fa-bars"></i><span class="right-nav-text">{{trans('main_trans.sections')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Sections.index')}}">{{trans('main_trans.List_sections')}}</a></li>
            </ul>
        </li>


        <!-- students-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i class="fa fa-graduation-cap"></i>{{trans('main_trans.students')}}
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="students-menu" class="collapse">
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#Student_information">{{trans('main_trans.information_student')}}
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="Student_information" class="collapse">
                        <li> <a href="{{route('Students.create')}}">{{trans('main_trans.add_student')}}</a></li>
                        <li> <a href="{{route('Students.index')}}">{{trans('main_trans.list_students')}}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#Students_upgrade">{{trans('main_trans.Students_Promotions')}}
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="Students_upgrade" class="collapse">
                        <li> <a href="{{route('Promotion.index')}}">{{trans('main_trans.add_Promotion')}}</a></li>
                        <li> <a href="{{route('Promotion.create')}}">{{trans('main_trans.list_Promotions')}}</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#Graduate students">{{trans('main_trans.Graduate_students')}}
                        <div class="pull-right"><i class="ti-plus"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="Graduate students" class="collapse">
                        <li> <a href="{{route('Graduation.create')}}">{{trans('main_trans.add_Graduate')}}</a> </li>
                        <li> <a href="{{route('Graduation.index')}}">{{trans('main_trans.list_Graduate')}}</a> </li>
                    </ul>
                </li>
            </ul>
        </li>



        <!-- Teachers-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                <div class="pull-left"><i class="fa fa-group"></i></i><span class="right-nav-text">{{trans('main_trans.Teachers')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Teachers.index')}}">{{trans('main_trans.List_Teachers')}}</a> </li>
            </ul>
        </li>


        <!-- Parents-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                <div class="pull-left"><i class="fa fa-group"></i><span class="right-nav-text">{{trans('main_trans.Parents')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{url('add_parent')}}">{{trans('main_trans.List_Parents')}}</a> </li>
            </ul>

        </li>

        <!-- Accounts-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                <div class="pull-left"><i class="fa fa-money"></i><span class="right-nav-text">{{trans('main_trans.Accounts')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Fees.index')}}">{{trans('main_trans.fees')}}</a> </li>
                <li> <a href="{{route('FeesInvoices.index')}}">{{trans('main_trans.invoices')}}</a> </li>
                <li> <a href="{{route('receipt_students.index')}}">{{trans('main_trans.payment')}}</a> </li>
                <li> <a href="{{route('ProcessingFees.index')}}">{{trans('main_trans.exclude_fees')}}</a> </li>
                <li> <a href="{{route('Payment_students.index')}}">{{trans('main_trans.return_money')}}</a> </li>
            </ul>
        </li>

        <!-- Attendance-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">
                <div class="pull-left"><i class="fa fa-calendar"></i><span class="right-nav-text">{{trans('main_trans.Attendance')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Attendance.index')}}">{{trans('main_trans.list_students')}}</a> </li>
            </ul>
        </li>

        <!-- Subjects-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Subjects">
                <div class="pull-left"><i class="fa fa-book"></i><span class="right-nav-text">{{trans('subjects.subjects')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Subjects" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('subjects.index')}}">{{trans('subjects.subjects_list')}}</a> </li>
            </ul>
        </li>

        <!-- Quizzes-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                <div class="pull-left"><i class="fa fa-pencil"></i><span class="right-nav-text">{{trans('main_trans.quizzes')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Quizzes.index')}}">{{trans('main_trans.quizzes')}}</a> </li>
                <li> <a href="{{route('questions.index')}}">{{trans('main_trans.questions')}}</a> </li>
            </ul>
        </li>


        <!-- library-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                <div class="pull-left"><i class="fa fa-book"></i><span class="right-nav-text">{{trans('main_trans.library')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('library.index')}}">{{trans('main_trans.books_list')}}</a> </li>
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
                <li> <a href="{{route('online_classes.index')}}">{{trans('main_trans.zoom_classes')}}</a> </li>
            </ul>
        </li>


        <!-- Settings-->
        <li>
            <a href="{{route('settings.index')}}"><i class="fa fa-cogs"></i><span class="right-nav-text">{{trans('main_trans.Settings')}} </span></a>
        </li>



       

    </ul>
</div>
