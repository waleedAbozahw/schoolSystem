<?php
namespace App\Repositary;

use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;

class AttendanceRepositary implements AttendanceRepositaryInterface{

    public function index(){
     $Grades = Grade::with(['Sections'])->get();
     $list_Grades = Grade::all();
     $teachers = Teacher::all();
     return view('pages.Attendance.Sections',compact('Grades','list_Grades','teachers'));

    }

    public function show($id){
       $students = Student::with(['attendance'])->where('section_id',$id)->get();
       return view('pages.Attendance.index',compact('students'));

    }

    public function edit($id){

    }

    public function store($request){

        foreach ($request->attendances as $studentId => $attendance) {

            if ($attendance == 'presence') {
                $attendance_status = true;
            }elseif ($attendance == 'absent') {
                $attendance_status = false;
            }
            Attendance::create([
                'student_id'=>$studentId,
                'grade_id'=>$request->grade_id,
                'classroom_id'=>$request->classroom_id,
                'section_id'=>$request->section_id,
                'teacher_id'=>1,
                'attendance_date'=>date('Y-m-d'),
                'attendance_status'=>$attendance_status

            ]);
        }
        toastr()->success('messages.success');
        return redirect()->back();

    }

    public function update($request){

    }

    public function destroy($request){

    }

}
