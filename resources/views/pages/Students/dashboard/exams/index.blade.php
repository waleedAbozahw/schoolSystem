@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
{{trans('Students_trans.exames_list')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<h3>{{trans('Students_trans.exames_list')}}</h3>


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
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('Students_trans.subject')}}</th>
                                            <th>{{trans('Students_trans.quiz_name')}}</th>
                                            <th>{{trans('Students_trans.quiz_degree')}}</th>
                                            <th>{{trans('Students_trans.student_degree')}} / {{trans('Students_trans.enter_exam')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($quizzes as $quizze)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{$quizze->subject->name}}</td>
                                            <td>{{$quizze->name}}</td>
                                            <td>{{$quizze->quiz_degree}}</td>
                                            <td>
                                                @if((App\Models\Degree::where('student_id',auth()->user()->id)->
                                                where('quiz_id',$quizze->id)->pluck('score')->isEmpty()))

                                                    <a href="{{route('student_exams.show',$quizze->id)}}" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true" onclick="alertAbuse()">
                                                        <i class="fa fa-book"></i></a>
                                                @else

                                                    {{App\Models\Degree::where('student_id',auth()->user()->id)->
                                                    where('quiz_id',$quizze->id)->pluck('score')}}

                                                @endif


                                            </td>
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
@toastr_js
@toastr_render

<script>
    function alertAbuse() {
        alert("برجاء عدم إعادة تحميل الصفحة بعد دخول الاختبار - في حال تم تنفيذ ذلك سيتم الغاء الاختبار بشكل اوتوماتيك ");
    }
</script>

@endsection
