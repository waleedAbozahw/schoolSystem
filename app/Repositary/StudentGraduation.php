<?php
namespace App\Repositary;

use App\Models\Grade;
use App\Models\Student;

class StudentGraduation implements StudentGraduationInterface {

    public function index()
    {
       $students = Student::onlyTrashed()->get();
       return view('pages.Students.Graduated.index',compact('students'));
    }

    public function create()
    {
       $Grades = Grade::all();
        return view('pages.Students.Graduated.create',compact('Grades'));
    }

    public function createOneGraduation($request)
    {
        Student::where('id',$request->id)->delete();
        toastr()->success(trans('messages.success'));
        return redirect()->back();
    }

    public function softDelete($request)
    {
        $students = Student::where('Grade_id',$request->Grade_id)->
        where('Classroom_id',$request->Classroom_id)->where('section_id',$request->section_id)->get();

        if ($students->count() == 0) {
            return redirect()->back()->with('error_Graduated', __(trans('Students_trans.empty_records')));
        }

        foreach ($students as $student) {
            $ids = explode(',',$student->id);
            Student::whereIn('id',$ids)->delete();
        }
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Graduation.index');

    }

    public function returnData($request)
    {
        Student::onlyTrashed()->where('id',$request->id)->first()->restore();
        toastr()->success(trans('messages.success'));
        return redirect()->back();

    }

    public function destroy($request)
    {
        Student::onlyTrashed()->where('id',$request->id)->first()->forceDelete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->back();
    }




}
