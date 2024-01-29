<?php

namespace App\Http\Controllers\Students\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::where('grade_id',auth()->user()->Grade_id)
        ->where('classroom_id',auth()->user()->Classroom_id)
        ->where('section_id',auth()->user()->section_id)
        ->orderBy('id','DESC')
        ->get();
       
        $student_degrees = Degree::where('student_id',auth()->user()->id)->get();

        return view('pages.Students.dashboard.exams.index',compact('quizzes','student_degrees'));
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
    public function show($quizze_id)
    {
        $student_id = Auth::user()->id;
        return view('pages.Students.dashboard.exams.show',compact('quizze_id','student_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
