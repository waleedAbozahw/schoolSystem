@extends('layouts.master')
@section('css')
    @section('title')
    {{trans('Parent_trans.results_list')}}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h3>{{trans('Parent_trans.results_list')}}</h3>
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
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('Parent_trans.student_name')}}</th>
                                            <th>{{trans('Parent_trans.quiz_name')}}</th>
                                            <th>{{trans('Parent_trans.quiz_degree')}}</th>
                                            <th>{{trans('Parent_trans.student_degree')}}</th>
                                            <th>{{trans('Parent_trans.quiz_date')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($degrees as $degree)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$degree->student->name}}</td>
                                                <td>{{$degree->quiz->name}}</td>
                                                <td>{{$degree->quiz->quiz_degree}}</td>
                                                <td>{{$degree->score}}</td>
                                                <td>{{$degree->date}}</td>
                                            </tr>
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

@endsection

