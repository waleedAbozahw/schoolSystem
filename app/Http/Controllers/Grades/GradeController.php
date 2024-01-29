<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGrades;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Grades = Grade::all();
        return view('pages.Grades.Grades', compact('Grades'));
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
    public function store(StoreGrades $request)
    {
        // // validation on uniqe grades
        // if (Grade::where('Name->ar',$request->Name)->orWhere('Name->en',$request->Name_en)->exists()) {
        //    return redirect()->back()->withErrors([trans('Grades_trans.exists')]);
        // }


        try {
            // another way
            $validated = $request->validated();
            $Grade = new Grade();
            $Grade->Name = ['en' => $request->Name_en, 'ar' => $request->Name];
            $Grade->Notes = $request->Notes;
            $Grade->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Grades.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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
    public function update(StoreGrades $request)
    {
        try {
            $validated = $request->validated();
            $Grades = Grade::findOrFail($request->id);
            $Grades->update([
                $Grades->Name = ['ar' => $request->Name, 'en' => $request->Name_en],
                $Grades->Notes = $request->Notes,
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Grades.index');
            // another way to back to index page
            /*$Grades = Grade::all();
             return view('pages.Grades.Grades', compact('Grades'));
             */
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $class_id =Classroom::where('Grade_Id',$request->id)->pluck('Grade_Id');
        if ($class_id->count() == 0) {
            $Grades = Grade::findOrFail($request->id)->delete();
            toastr()->success(trans('messages.Delete'));
            return redirect()->route('Grades.index');
        }else{
            toastr()->error(trans('Grades_trans.delete_Grade_Error'));
            return redirect()->route('Grades.index');
        }


    }
}
