@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('Teacher_trans.attendance_report')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->

<h3>{{trans('Teacher_trans.attendance_report')}}</h3>

<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post"  action="{{ route('attendance_search') }}" autocomplete="off">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Teacher_trans.search_information')}}</h6><br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student">{{trans('Teacher_trans.students')}}</label>
                                <select class="custom-select mr-sm-2" name="student_id">
                                    <option value="0">{{trans('Teacher_trans.all')}}</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-body datepicker-form">
                            <div class="input-group" data-date-format="yyyy-mm-dd">
                                <input type="text"  class="form-control range-from date-picker-default" placeholder="{{trans('Teacher_trans.start_date')}}" required name="from">
                                <span class="input-group-addon">{{trans('Teacher_trans.to_date')}}</span>
                                <input class="form-control range-to date-picker-default" placeholder="{{trans('Teacher_trans.end_date')}}" type="text" required name="to">
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
                </form>
                @isset($Students)
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr>
                            <th class="alert-success">#</th>
                            <th class="alert-success">{{trans('Students_trans.name')}}</th>
                            <th class="alert-success">{{trans('Students_trans.Grade')}}</th>
                            <th class="alert-success">{{trans('Students_trans.section')}}</th>
                            <th class="alert-success">{{trans('Teacher_trans.date')}}</th>
                            <th class="alert-warning">{{trans('Teacher_trans.status')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($Students as $student)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{$student->students->name}}</td>
                                <td>{{$student->grade->Name}}</td>
                                <td>{{$student->section->Name_Section}}</td>
                                <td>{{$student->attendance_date}}</td>
                                <td>

                                    @if($student->attendance_status == 0)
                                        <span class="btn-danger">{{trans('Teacher_trans.absent')}}</span>
                                    @else
                                        <span class="btn-success">{{trans('Teacher_trans.present')}}</span>
                                    @endif
                                </td>
                            </tr>
                        @include('pages.Students.Delete')
                        @endforeach
                    </table>
                </div>
                @endisset

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
