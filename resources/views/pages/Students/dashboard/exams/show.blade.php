@extends('layouts.master')
@section('css')
    @toastr_css
    @livewireStyles
    @section('title')
    {{trans('Students_trans.do_exam')}}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <h3>{{trans('Students_trans.do_exam')}}</h3>

    <!-- breadcrumb -->
@endsection
@section('content')

@livewire('show-question',['quizze_id'=>$quizze_id, 'student_id'=>$student_id])

@endsection
@section('js')
    @toastr_js
    @toastr_render
    @livewireScripts
@endsection

