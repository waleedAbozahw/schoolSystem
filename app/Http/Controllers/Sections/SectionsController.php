<?php

namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSection;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Sections;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();
        $list_Grades = Grade::all();
        $teachers = Teacher::all();
        return view('pages.Sections.Sections',compact('Grades','list_Grades','teachers'));
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
    public function store(StoreSection $request)
    {
        // try {
           $validated = $request->validated();
           $sections= new Sections();
           $sections->Name_Section = ['ar'=>$request->Name_Section_Ar,'en'=>$request->Name_Section_En];
           $sections->Grade_id = $request->Grade_id;
           $sections->Class_id = $request->Class_id;
           $sections->Status =1;
           $sections->save();
           $sections->teachers()->attach($request->teacher_id);
           toastr()->success(trans('messages.success'));
           return redirect()->route('Sections.index');

        // } catch (\Exception $e) {
        //     return redirect()->back()->withErrors(['errors'=>$e->getMessage()]);
        // }
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
    public function update(StoreSection $request)
    {
        try {
            $sections = Sections::findOrFail($request->id);

                $sections->Name_Section = ['ar'=>$request->Name_Section_Ar,'en'=>$request->Name_Section_En];
                $sections->Grade_id = $request->Grade_id;
                $sections->Class_id = $request->Class_id;

                if (isset($request->Status)) {
                   $sections->Status = 1;
                }else{
                    $sections->Status = 2;
                }

                // update pivot table
                if (isset($request->teacher_id)) {
                    $sections->teachers()->sync($request->teacher_id);
                }else {
                    $sections->teachers()->sync(array());
                }
                
            $sections->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Sections.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $sections = Sections::findOrFail($request->id)->delete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Sections.index');
    }

    public function getclasses($id){
      $list_classes = Classroom::where('Grade_Id',$id)->pluck('Name_Class','id');
      return $list_classes;

    }
}
