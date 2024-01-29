<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Repositary\StudentGraduationInterface;
use Illuminate\Http\Request;

class GraduationController extends Controller
{
    protected $graduation;

    public function __construct(StudentGraduationInterface $graduation)
    {
       return $this->graduation = $graduation;
    }
    public function index()
    {
        return $this->graduation->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->graduation->create();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->graduation->softDelete($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return $this->graduation->createOneGraduation($request);
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
    public function update(Request $request)
    {
        return $this->graduation->returnData($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->graduation->destroy($request);
    }


}
