<?php

namespace App\Http\Controllers\Students\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $information = Student::findOrFail(auth()->user()->id);
       return view('pages.Students.dashboard.profile',compact('information'));
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $student = Student::findOrFail($id);
        if (!empty($request->password)) {
            $student->name=['ar'=>$request->Name_ar,'en'=>$request->Name_en];
            $student->password=Hash::make($request->password);
            $student->save();
        }else{
            $student->name=['ar'=>$request->Name_ar,'en'=>$request->Name_en];
            $student->save();
        }



       toastr()->success('Update');
       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
