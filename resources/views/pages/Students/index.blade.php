@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.list_students')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->

   <h3>{{trans('main_trans.list_students')}}</h3>

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
                                <a href="{{route('Students.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('main_trans.add_student')}}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('Students_trans.name')}}</th>
                                            <th>{{trans('Students_trans.email')}}</th>
                                            <th>{{trans('Students_trans.gender')}}</th>
                                            <th>{{trans('Students_trans.Grade')}}</th>
                                            <th>{{trans('Students_trans.classrooms')}}</th>
                                            <th>{{trans('Students_trans.section')}}</th>
                                            <th>{{trans('Students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->email}}</td>
                                            <td>{{$student->gender->Name}}</td>
                                            <td>{{$student->grade->Name}}</td>
                                            <td>{{$student->classroom->Name_Class}}</td>
                                            <td>{{$student->section->Name_Section}}</td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{trans('processes.processes')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{route('Students.show',$student->id)}}"><i style="color: #ffc107" class="fa fa-eye "></i>&nbsp;   {{trans('processes.show_student_data')}}</a>
                                                            <a class="dropdown-item" href="{{route('Students.edit',$student->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;   {{trans('processes.edit_student_data')}}</a>
                                                            <a class="dropdown-item" href="{{route('FeesInvoices.show',$student->id)}}"><i style="color: #0000cc" class="fa fa-edit"></i>&nbsp; {{trans('processes.add_invoice')}}&nbsp;</a>
                                                            <a class="dropdown-item" href="{{route('receipt_students.show',$student->id)}}"><i style="color: green" class="fa fa-money"></i>&nbsp; &nbsp; {{trans('processes.pay')}}</a>
                                                            <a class="dropdown-item" href="{{route('ProcessingFees.show',$student->id)}}"><i style="color: #9dc8e2" class="fa fa-money"></i>&nbsp; &nbsp;  {{trans('processes.exclude_fees')}}</a>
                                                            <a class="dropdown-item" href="{{route('Payment_students.show',$student->id)}}"><i style="color:goldenrod" class="fa fa-bank"></i>&nbsp; &nbsp; {{trans('processes.return_fees')}}</a>
                                                            <a class="dropdown-item" data-target="#Delete_Student{{ $student->id }}" data-toggle="modal" href="#"><i style="color: red" class="fa fa-trash"></i>&nbsp; {{trans('processes.delete')}} </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        @include('pages.Students.Delete')


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
