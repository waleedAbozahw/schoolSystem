@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
   {{trans('main_trans.fees_invoices')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
  <h3>{{trans('main_trans.fees_invoices')}}</h3>
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
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{trans('main_trans.name')}}</th>
                                            <th>{{trans('main_trans.fees_kind')}}</th>
                                            <th>{{trans('main_trans.tidysum')}}</th>
                                            <th>{{trans('main_trans.grade')}}</th>
                                            <th>{{trans('main_trans.classroom')}}</th>
                                            <th>{{trans('main_trans.notes')}}</th>
                                            <th>{{trans('processes.processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($Fee_invoices as $Fee_invoice)
                                            <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$Fee_invoice->student->name}}</td>
                                            <td>{{$Fee_invoice->fees->title}}</td>
                                            <td>{{ number_format($Fee_invoice->amount, 2) }}</td>
                                            <td>{{$Fee_invoice->grade->Name}}</td>
                                            <td>{{$Fee_invoice->classroom->Name_Class}}</td>
                                            <td>{{$Fee_invoice->description}}</td>
                                                <td>
                                                    <a href="{{route('FeesInvoices.edit',$Fee_invoice->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true" title="{{trans('processes.edit')}}"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Fee_invoice{{$Fee_invoice->id}}" title="{{trans('processes.delete')}}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @include('pages.Fees_Invoices.Delete')
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
