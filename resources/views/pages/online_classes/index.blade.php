@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{trans('main_trans.zoom_classes')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
<h3>{{trans('main_trans.zoom_classes')}}</h3>

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
                                <!-- add meeting zoom by integration package -->
                                <!-- <a href="{{route('online_classes.create')}}" class="btn btn-success" role="button" aria-pressed="true">اضافة حصة اونلاين جديدة</a> -->
                                <a class="btn btn-success" href="{{route('indirectCreate')}}">{{trans('main_trans.add_zoom_class')}}</a>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{trans('main_trans.grade')}}</th>
                                            <th>{{trans('main_trans.classroom')}}</th>
                                            <th>{{trans('main_trans.section')}}</th>
                                            <th>{{trans('main_trans.meeting_creater')}}</th>
                                            <th>{{trans('main_trans.class_title')}}</th>
                                            <th>{{trans('main_trans.start_date')}}</th>
                                            <th>{{trans('main_trans.class_duration')}}</th>
                                            <th>{{trans('main_trans.class_link')}}</th>
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
                                                <td class="text-danger"><a href="{{$online_classe->join_url}}" target="_blank">{{trans('main_trans.join_now')}}</a></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$online_classe->meeting_id}}" title="{{trans('processes.delete')}}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('pages.online_classes.delete')
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
