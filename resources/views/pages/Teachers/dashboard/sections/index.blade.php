@extends('layouts.master')
@section('css')

@section('title')
{{trans('Teacher_trans.sections')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
<h3>{{trans('Teacher_trans.sections')}}</h3>
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('Teacher_trans.grade')}}</th>
                                <th>{{trans('Teacher_trans.classroom')}}</th>
                                <th>{{trans('Teacher_trans.section')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sections as $section)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $section->Grades->Name }}</td>
                                    <td>{{ $section->My_classs->Name_Class }}</td>
                                    <td>{{ $section->Name_Section }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
@endsection
