<?php
namespace App\Repositary;

use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\MyParent;
use App\Models\Nationality;
use App\Models\Sections;
use App\Models\Student;
use App\Models\Type_Blood;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentRepositary implements StudentRepositaryInterface{

public function Create_Student()
{
  $data['my_classes'] = Grade::all();
  $data['parents'] = MyParent::all();
  $data['Genders'] = Gender::all();
  $data['nationals'] = Nationality::all();
  $data['bloods'] = Type_Blood::all();
  return view('pages.Students.add',$data);
}

public function Get_classrooms($id)
{
    $list_classes = Classroom::where('Grade_id',$id)->pluck('Name_Class','id');
    return $list_classes;
}

public function Get_Sections($id)
{
    $list_sections = Sections::where('class_id',$id)->pluck('Name_Section','id');
    return $list_sections;
}

public function Get_Students()
{
    $students = Student::all();
    return view('pages.Students.index',compact('students'));
}

public function Store_Students($request)
{
    DB::beginTransaction(); // check if two tables are correct before add to database
     try {
        $students = new Student();
        $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $students->email = $request->email;
        $students->password = Hash::make($request->password);
        $students->gender_id = $request->gender_id;
        $students->nationalitie_id = $request->nationalitie_id;
        $students->blood_id = $request->blood_id;
        $students->Date_Birth = $request->Date_Birth;
        $students->Grade_id = $request->Grade_id;
        $students->Classroom_id = $request->Classroom_id;
        $students->section_id = $request->section_id;
        $students->parent_id = $request->parent_id;
        $students->academic_year = $request->academic_year;
        $students->save();

        // insert image
        if ($request->hasfile('photos')) {
              foreach ($request->file('photos') as $file) {
                 $name = $file->getClientOriginalName();
                 $file->storeAs('attachments/students/'.$students->name,$name,'upload_attachments');
                 // insert in images table
                 $images = new Image();
                 $images->filename = $name;
                 $images->imageable_id = $students->id;
                 $images->imageable_type = 'App\Models\Student';
                 $images->save();
              }
        }
        DB::commit();  // insert data in database if two tables are correct
        toastr()->success(trans('messages.success'));
        return redirect()->route('Students.create');



   }

    catch (\Exception $e){

        DB::rollBack();  // if there is an mistake in any table delete any adding data in db

        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

}

public function Edit_Student($id)
    {
        $data['Grades'] = Grade::all();
        $data['parents'] = MyParent::all();
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationality::all();
        $data['bloods'] = Type_Blood::all();
        $Students =  Student::findOrFail($id);
        return view('pages.Students.edit',$data,compact('Students'));
    }

    public function Update_Student($request)
    {

        try {
            $Edit_Students = Student::findorfail($request->id);
            $Edit_Students->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
            $Edit_Students->email = $request->email;
            $Edit_Students->password = Hash::make($request->password);
            $Edit_Students->gender_id = $request->gender_id;
            $Edit_Students->nationalitie_id = $request->nationalitie_id;
            $Edit_Students->blood_id = $request->blood_id;
            $Edit_Students->Date_Birth = $request->Date_Birth;
            $Edit_Students->Grade_id = $request->Grade_id;
            $Edit_Students->Classroom_id = $request->Classroom_id;
            $Edit_Students->section_id = $request->section_id;
            $Edit_Students->parent_id = $request->parent_id;
            $Edit_Students->academic_year = $request->academic_year;
            $Edit_Students->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Students.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function Delete_Student($request)
    {
        //[destroy function] another way to delete
        Student::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Students.index');
    }

    public function Show_Student($id)
    {
        $Student = Student::findOrFail($id);
        return view('pages.Students.show',compact('Student'));
    }

    public function Upload_Attachment($request)
    {
       foreach ($request->file('photos') as $file) {
              $name = $file->getClientOriginalName();
              $file->storeAs('attachments/students/'.$request->student_name,$name,'upload_attachments');

              $image = new Image();
              $image->filename=$name;
              $image->imageable_id=$request->student_id;
              $image->imageable_type='App\Models\Student';
              $image->save();
       }
       toastr()->success(trans('messages.success'));
       return redirect()->route('Students.show',$request->student_id);
    }

    public function Download_attachment($studentsname,$filename){
        return response()->download(public_path('attachments/students/'.$studentsname.'/'.$filename));
    }

    public function Delete_attachment($request)
    {
       // delete img in disk
       Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->filename);

       // delete in DB
       image::where('id',$request->id)->where('filename',$request->filename)->delete();
       toastr()->success(trans('messages.Delete'));
       return redirect()->route('Students.show',$request->student_id);
    }

}
