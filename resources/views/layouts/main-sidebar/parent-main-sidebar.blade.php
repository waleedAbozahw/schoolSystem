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


        <!-- الابناء-->
        <li>
            <a href="{{route('sons_index')}}"><i class="fa fa-graduation-cap"></i><span
                    class="right-nav-text">{{trans('Parent_trans.sons')}}</span></a>
        </li>

        <!-- تقرير الحضور والغياب-->
        <li>
            <a href="{{route('children_attendance')}}"><i class="fa fa-pencil"></i><span
                    class="right-nav-text">{{trans('Parent_trans.attendance_report')}}</span></a>
        </li>

        <!-- تقرير المالية-->
        <li>
            <a href="{{route('children_fees')}}"><i class="fa fa-money"></i><span
                    class="right-nav-text">{{trans('Parent_trans.money_report')}}</span></a>
        </li>


        <!-- Settings-->
        <li>
            <a href="{{route('parent_profile')}}"><i class="fa fa-user"></i><span
                    class="right-nav-text">{{trans('Parent_trans.profile')}}</span></a>
        </li>

    </ul>
</div>
