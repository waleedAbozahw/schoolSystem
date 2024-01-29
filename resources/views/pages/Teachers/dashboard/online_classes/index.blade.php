@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{trans('Teacher_trans.zoom_classes')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
<h3>{{trans('Teacher_trans.zoom_classes')}}</h3>


<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('online_zoom_classes.create')}}" class="btn btn-success" role="button" aria-pressed="true">{{trans('Teacher_trans.add_zoom_class')}}</a>

                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{trans('Teacher_trans.grade')}}</th>
                                            <th>{{trans('Teacher_trans.classroom')}}</th>
                                            <th>{{trans('Teacher_trans.section')}}</th>
                                            <th>{{trans('Teacher_trans.teacher_name')}}</th>
                                            <th>{{trans('Teacher_trans.class_title')}}</th>
                                            <th>{{trans('Teacher_trans.start_date')}}</th>
                                            <th>{{trans('Teacher_trans.class_duration_inMinutes')}}</th>
                                            <th>{{trans('Teacher_trans.entering_link_students')}}</th>
                                            <th>{{trans('processes.processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($online_classes as $online_classe)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$online_classe->grade->Name}}</td>
                                            <td>{{ $online_classe->classroom->Name_Class }}</td>
                                            <td>{{$online_classe->section->Name_Section}}</td>
                                                <td>{{$online_classe->created_by}}</td>
                                                <td>{{$online_classe->topic}}</td>
                                                <td>{{$online_classe->start_at}}</td>
                                                <td>{{$online_classe->duration}}</td>
                                                <td class="text-danger"><a href="{{$online_classe->join_url}}" target="_blank">{{trans('Teacher_trans.join_now')}}</a></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_meeting{{$online_classe->meeting_id}}" title="{{trans('processes.delete')}}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('pages.Teachers.dashboard.online_classes.delete')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
