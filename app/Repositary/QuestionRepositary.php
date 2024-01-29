<?php
namespace App\Repositary;

use App\Models\Question;
use App\Models\Quiz;

class QuestionRepositary implements QuestionRepositaryInterface{

    public function index(){
        $questions= Question::get();

        return view('pages.Questions.index',compact('questions'));

    }

    public function create(){
        $quizzes = Quiz::all();
        return view('pages.Questions.create',compact('quizzes'));
    }

    public function edit($id){
        $question = Question::findOrFail($id);
        $quizzes=Quiz::all();
        return view('pages.Questions.edit',compact('question','quizzes'));

    }

    public function store($request){
      $question = new Question();
      $question->title=$request->title;
      $question->answers=$request->answers;
      $question->right_answer=$request->right_answer;
      $question->score=$request->score;
      $question->quiz_id=$request->quiz_id;
      $question->save();

      toastr()->success('messages.success');
      return redirect()->route('questions.index');
    }

    public function update($request){
      $question = Question::findOrFail($request->id);
      $question->title=$request->title;
      $question->answers=$request->answers;
      $question->right_answer=$request->right_answer;
      $question->score=$request->score;
      $question->quiz_id=$request->quiz_id;
      $question->save();

      toastr()->success('messages.Update');
      return redirect()->route('questions.index');
    }

    public function destroy($request){
         Question::destroy($request->id);
         toastr()->success('messages.Update');
         return redirect()->route('questions.index');
    }

}
