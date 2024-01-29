<?php

namespace App\Http\Controllers\Quizzes;

use App\Http\Controllers\Controller;
use App\Repositary\QuizRepositaryInterface;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    protected $quiz;
    public function __construct(QuizRepositaryInterface $quiz)
    {
         $this->quiz=$quiz;
    }
    public function index()
    {
       return $this->quiz->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->quiz->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->quiz->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->quiz->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->quiz->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->quiz->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->quiz->destroy($request);
    }
}
