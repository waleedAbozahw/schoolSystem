<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroom;
use App\Http\Requests\StoreGrades;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $My_Classes = Classroom::all();
        $Grades = Grade::all();
        return view('pages.My_Classes.My_Classes', compact('My_Classes', 'Grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreClassroom $request)
    {

        try {
            $validated = $request->validated();
            $list_classes = $request->List_Classes;
            foreach ($list_classes as $list_class) {
                $My_Classes = new Classroom();
                $My_Classes->Name_Class = ['en' => $list_class['Name_class_en'], 'ar' => $list_class['Name']];
                $My_Classes->Grade_Id = $list_class['Grade_id'];
                $My_Classes->save();
            }
            toastr()->success(trans('messages.success'));
            return redirect()->route('Classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        try {
            $My_Classes = Classroom::findOrFail($request->id);
            $My_Classes->update([
                $My_Classes->Name_Class = ['ar' => $request->Name, 'en' => $request->Name_en],
                $My_Classes->Grade_Id = $request->Grade_id,
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $My_Classes = Classroom::findOrFail($request->id)->delete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');
    }

    public function delete_all(Request $request)
    {
        $delete_all_id = explode(',', $request->delete_all_id);
        Classroom::whereIn('id', $delete_all_id)->delete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');
    }
    
    public function Filter_Classes(Request $request)
    {
        $Grades = Grade::all();
        $Search = Classroom::select('*')->where('Grade_Id', $request->Grade_id)->get();
        return view('pages.My_Classes.My_Classes', compact('Grades'))->withDetails($Search);
    }
}
