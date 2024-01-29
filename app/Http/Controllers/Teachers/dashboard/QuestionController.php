<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
        $questions = new Question();
        $questions->title=$request->title;
        $questions->answers=$request->answers;
        $questions->right_answer=$request->right_answer;
        $questions->score=$request->score;
        $questions->quiz_id=$request->quiz_id;
        $questions->save();
        toastr()->success('messages.success');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $quiz_id = $id;
        return view('pages.Teachers.dashboard.Questions.create',compact('quiz_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('pages.Teachers.dashboard.Questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $questions = Question::findOrFail($id);
        $questions->title=$request->title;
        $questions->answers=$request->answers;
        $questions->right_answer=$request->right_answer;
        $questions->score=$request->score;
        $questions->save();
        toastr()->success('messages.Update');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Question::destroy($id);
        toastr()->success('messages.Delete');
        return redirect()->back();
    }

    public function get_questions(){

       $quiz = Quiz::where('teacher_id',auth()->user()->id)->first();
       $questions =Question::where('quiz_id',$quiz->id)->get();

     return view('pages.Teachers.dashboard.Questions.index',compact('questions','quiz'));
    }
}
