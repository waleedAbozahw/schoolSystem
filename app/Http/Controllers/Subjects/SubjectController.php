<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\Controller;
use App\Repositary\SubjectRepositaryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected $subjects;
    public function __construct(SubjectRepositaryInterface $subjects)
    {
         $this->subjects=$subjects;
    }

    public function index()
    {
        return $this->subjects->index();
    }


    public function create()
    {
        return $this->subjects->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->subjects->store( $request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->subjects->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        return $this->subjects->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->subjects->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->subjects->destroy($request);
    }
}
