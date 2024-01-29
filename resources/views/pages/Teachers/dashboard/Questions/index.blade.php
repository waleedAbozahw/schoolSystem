@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{trans('Teacher_trans.questions')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->

<h3> {{trans('Teacher_trans.question')}} : <span class="text-danger">{{$quiz->name}}</span></h3>

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
                                <a href="{{route('teacher_questions.show',$quiz->id)}}" class="btn btn-success btn-sm" role="button" aria-pressed="true">{{trans('Teacher_trans.add_question')}}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{trans('Teacher_trans.question')}}</th>
                                            <th scope="col">{{trans('Teacher_trans.answers')}}</th>
                                            <th scope="col">{{trans('Teacher_trans.right_answer')}}</th>
                                            <th scope="col">{{trans('Teacher_trans.degree')}}</th>
                                            <th scope="col">{{trans('Teacher_trans.quiz_name')}}</th>
                                            <th scope="col">{{trans('processes.processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($questions as $question)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$question->title}}</td>
                                                <td>{{$question->answers}}</td>
                                                <td>{{$question->right_answer}}</td>
                                                <td>{{$question->score}}</td>
                                                <td>{{$question->quiz->name}}</td>
                                                <td>
                                                    <a href="{{route('teacher_questions.edit',$question->id)}}"
                                                       class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit" title="{{trans('processes.edit')}}"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#delete_exam{{ $question->id }}" title="{{trans('processes.delete')}}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                        @include('pages.Teachers.dashboard.Questions.destroy')
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
