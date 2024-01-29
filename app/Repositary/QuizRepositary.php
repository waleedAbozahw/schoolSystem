<?php
namespace App\Repositary;

use App\Models\Grade;
use App\Models\Quiz;
use App\Models\Subject;
use App\Models\Teacher;

class QuizRepositary implements QuizRepositaryInterface{

   public function index(){
    $quizzes = Quiz::all();
      return view('pages.Quizzes.index',compact('quizzes'));
   }
   public function create(){
    $data['subjects'] = Subject::all();
    $data['teachers'] = Teacher::get();
    $data['grades'] = Grade::all();

      return view('pages.Quizzes.create',$data);
   }
   public function store($request){
        $quiz = new Quiz();
        $quiz->name=['ar'=>$request->Name_ar,'en'=>$request->Name_en];
        $quiz->subject_id=$request->subject_id;
        $quiz->grade_id=$request->Grade_id;
        $quiz->classroom_id=$request->Classroom_id;
        $quiz->section_id=$request->section_id;
        $quiz->teacher_id=$request->teacher_id;

        $quiz->save();
        toastr()->success('messages.success');
        return redirect()->route('Quizzes.index');

   }
   public function update($request){
        $quiz = Quiz::findOrFail($request->id);
        $quiz->name=['ar'=>$request->Name_ar,'en'=>$request->Name_en];
        $quiz->subject_id=$request->subject_id;
        $quiz->grade_id=$request->Grade_id;
        $quiz->classroom_id=$request->Classroom_id;
        $quiz->section_id=$request->section_id;
        $quiz->teacher_id=$request->teacher_id;

        $quiz->save();
        toastr()->success('messages.Update');
        return redirect()->route('Quizzes.index');

   }
   public function edit($id){
    $data['quizz'] = Quiz::findOrFail($id);
    $data['subjects'] = Subject::all();
    $data['teachers'] = Teacher::get();
    $data['grades'] = Grade::all();

      return view('pages.Quizzes.edit',$data);

   }
   public function destroy($request){
    Quiz::destroy($request->id);
    toastr()->success('messages.Delete');
    return redirect()->route('Quizzes.index');

   }
   public function show($id){

   }

}
