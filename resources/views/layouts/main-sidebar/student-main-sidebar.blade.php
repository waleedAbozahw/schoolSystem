<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.Programname')}} </li>


        <!-- الامتحانات-->
        <li>
            <a href="{{route('student_exams.index')}}"><i class="fa fa-book"></i><span
                    class="right-nav-text">{{trans('Students_trans.exames')}}</span></a>
        </li>


        <!-- Settings-->
        <li>
            <a href="{{route('student_profile.index')}}"><i class="fa fa-user"></i><span
                    class="right-nav-text">{{trans('Students_trans.profile')}}</span></a>
        </li>

    </ul>
</div>
