<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Degree;
use App\Models\Grade;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Sections;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::where('teacher_id',auth()->user()->id)->get();
        return view('pages.Teachers.dashboard.Quizzes.index',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['subjects'] = Subject::all();
        $data['grades'] = Grade::all();
        return view('pages.Teachers.dashboard.Quizzes.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $quiz = new Quiz();
        $quiz->name=['ar'=>$request->Name_ar,'en'=>$request->Name_en];
        $quiz->quiz_degree=$request->quiz_degree;
        $quiz->subject_id=$request->subject_id;
        $quiz->grade_id=$request->Grade_id;
        $quiz->classroom_id=$request->Classroom_id;
        $quiz->section_id=$request->section_id;
        $quiz->teacher_id=auth()->user()->id;

        $quiz->save();
        toastr()->success('messages.success');
        return redirect()->route('quizzes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $questions = Question::where('quiz_id',$id)->get();
        $quiz = Quiz::findOrFail($id);
        return view('pages.Teachers.dashboard.Questions.index',compact('questions','quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['quizz'] = Quiz::findOrFail($id);
        $data['subjects'] = Subject::all();
        $data['grades'] = Grade::all();

          return view('pages.Teachers.dashboard.Quizzes.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $quiz = Quiz::findOrFail($request->id);
        $quiz->name=['ar'=>$request->Name_ar,'en'=>$request->Name_en];
        $quiz->quiz_degree=$request->quiz_degree;
        $quiz->subject_id=$request->subject_id;
        $quiz->grade_id=$request->Grade_id;
        $quiz->classroom_id=$request->Classroom_id;
        $quiz->section_id=$request->section_id;
        $quiz->teacher_id=auth()->user()->id;

        $quiz->save();
        toastr()->success('messages.Update');
        return redirect()->route('quizzes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Quiz::destroy($request->id);
        toastr()->success('messages.Delete');
        return redirect()->route('quizzes.index');
    }

    public function student_quizze($quizze_id)
    {
        $degrees = Degree::where('quiz_id',$quizze_id)->get();
        return view('pages.Teachers.dashboard.Quizzes.student_quizze',compact('degrees'));

    }

    public function repeat_quizze(Request $request)
    {
        Degree::where('student_id',$request->student_id)->where('quiz_id',$request->quizze_id)->delete();
       toastr()->success('تم فتح الاختبار مرة للطالب');
       return redirect()->back();

    }


}
