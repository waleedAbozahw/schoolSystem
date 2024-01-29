<?php
namespace App\Repositary;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Mockery\Matcher\Subset;

class SubjectRepositary implements SubjectRepositaryInterface{

    public function index(){
        $subjects = Subject::all();
        // another way to call a model
       // $subjects = Subject::get();
        return view('pages.Subjects.index',compact('subjects'));

    }

    public function create()
    {
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.Subjects.create',compact('grades','teachers'));
    }

    public function show($id){

    }

    public function store($request){
          $subject = new Subject();
          $subject->name=['ar'=>$request->Name_ar,'en'=>$request->Name_en];
          $subject->grade_id=$request->Grade_id;
          $subject->classroom_id=$request->Class_id;
          $subject->teacher_id=$request->teacher_id;
          $subject->save();

          toastr()->success('messages.success');
          return redirect()->route('subjects.index');

    }

    public function edit($id){
        $subject = Subject::findOrFail($id);
        $grades = Grade::get();
        $teachers = Teacher::get();
        return view('pages.Subjects.edit',compact('subject','grades','teachers'));
    }

    public function update($request){
        $subject = Subject::findOrFail($request->id);
        $subject->name=['ar'=>$request->Name_ar,'en'=>$request->Name_en];
        $subject->grade_id=$request->Grade_id;
        $subject->classroom_id=$request->Class_id;
        $subject->teacher_id=$request->teacher_id;
        $subject->save();

        toastr()->success('messages.success');
        return redirect()->route('subjects.index');
    }

    public function destroy($request){
        Subject::destroy($request->id);
        toastr()->success('messages.Delete');
        return redirect()->back();

    }
}
