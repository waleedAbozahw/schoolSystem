@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{trans('main_trans.fees')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
<h3>{{trans('main_trans.fees')}}</h3>
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
                                <a href="{{route('Fees.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('main_trans.add_fees')}}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{trans('main_trans.name')}}</th>
                                            <th>{{trans('main_trans.tidysum')}}</th>
                                            <th>{{trans('main_trans.grade')}}</th>
                                            <th>{{trans('main_trans.classroom')}}</th>
                                            <th>{{trans('main_trans.year_study')}}</th>
                                            <th>{{trans('main_trans.notes')}}</th>
                                            <th>{{trans('processes.processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($fees as $fee)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$fee->title}}</td>
                                            <td>{{ number_format($fee->amount, 2) }}</td>
                                            <td>{{$fee->grade->Name}}</td>
                                            <td>{{$fee->classroom->Name_Class}}</td>
                                            <td>{{$fee->year}}</td>
                                            <td>{{$fee->description}}</td>
                                                <td>
                                                    <a href="{{route('Fees.edit',$fee->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="{{trans('processes.edit')}}"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Fee{{ $fee->id }}" title="{{ trans('processes.delete') }}"><i class="fa fa-trash"></i></button>
                                                   

                                                </td>
                                            </tr>
                                        @include('pages.Fees.Delete')
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
