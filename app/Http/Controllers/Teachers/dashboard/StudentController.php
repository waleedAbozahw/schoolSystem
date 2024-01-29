<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // query buider way
       $ids = Teacher::findOrFail(auth()->user()->id)->sections()->pluck('sections_id');
        $students = Student::whereIn('section_id',$ids)->get();
        return view('pages.Teachers.dashboard.students.index',compact('students'));
    }

    public function sections(){
        $sections = Teacher::findOrFail(auth()->user()->id)->sections()->get();

        return view('pages.Teachers.dashboard.sections.index',compact('sections'));
    }

    public function attendance(Request $request){


        foreach ($request->attendances as $studentId => $attendance) {

            if ($attendance == 'presence') {
                $attendance_status = true;
            }elseif ($attendance == 'absent') {
                $attendance_status = false;
            }
            Attendance::updateorCreate(
                [
                    'student_id'=>$studentId,
                    'attendance_date'=>date('Y-m-d')
                ],

                [
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {


    }
    public function attendanceReport(Request $request)
    {
          $ids = Teacher::findOrFail(auth()->user()->id)->sections()->pluck('sections_id');
          $students = Student::whereIn('section_id',$ids)->get();

        return view('pages.Teachers.dashboard.students.attendance_report',compact('students'));
    }
    public function attendanceSearch(Request $request)
    {

        $request->validate([
            'from'=>'required|date|date_format:Y-m-d',
            'to'=>'required|date|date_format:Y-m-d|after_or_equal:from',
        ],[
            'to.after_or_equal'=> 'تاريخ البداية لابد ان يكون اصغر من تاريخ النهاية او يساويه',
            'from.date_format'=> 'yyyy-mm-dd صيغة التاريخ يجب ان تكون',
            'to.date_format'=> 'yyyy-mm-dd صيغة التاريخ يجب ان تكون',
        ]);

        $ids = Teacher::findOrFail(auth()->user()->id)->sections()->pluck('sections_id');
        $students = Student::whereIn('section_id',$ids)->get();
         if ($request->student_id == 0) {
           $Students = Attendance::whereBetween('attendance_date',[$request->from,$request->to])->get();
           return view('pages.Teachers.dashboard.students.attendance_report',compact('Students','students'));


         }else{

            $ids = Teacher::findOrFail(auth()->user()->id)->sections()->pluck('sections_id');
            $students = Student::whereIn('section_id',$ids)->get();
            $Students = Attendance::whereBetween('attendance_date',[$request->from,$request->to])
            ->where('student_id',$request->student_id)->get();
            return view('pages.Teachers.dashboard.students.attendance_report',compact('Students','students'));

         }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
