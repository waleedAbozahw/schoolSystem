<?php
namespace App\Repositary;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;

use Exception;
use Illuminate\Support\Facades\Hash;

class TeacherRepositary implements TeacherRepositaryInterface{
    public function getAllTeachers()
    {
        return Teacher::all();
    }

    public function Getspecialization()
    {
           return Specialization::all();
    }
    public function GetGender()
    {
      return Gender::all();
    }
    public function StoreTeachers($request){

        try {
                $Teachers = new Teacher();
                $Teachers->email = $request->Email;
                $Teachers->password =  Hash::make($request->Password);
                $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
                $Teachers->Specialization_id = $request->Specialization_id;
                $Teachers->Gender_id = $request->Gender_id;
                $Teachers->Joining_Date = $request->Joining_Date;
                $Teachers->Address = $request->Address;
                $Teachers->save();
                toastr()->success(trans('messages.success'));
                return redirect()->route('Teachers.create');
            }
            catch (Exception $e) {
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }

        }
    public function EditTeachers($id){
            return Teacher::findOrFail($id);
        }

    public function UpdateTeachers($request)
    {
        try {
            $Teachers = Teacher::findOrFail($request->id);
            $Teachers->email = $request->Email;
            $Teachers->password =  Hash::make($request->Password);
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Teachers.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function DeleteTeachers($request)
    {
        Teacher::findOrFail($request->id)->delete();
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Teachers.index');
    }

}
