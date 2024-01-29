<?php
namespace App\Repositary;

use App\Models\Grade;
use App\Models\promotion;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\DB;

class StudentPromotion implements StudentPromotionInterface{

    public function index()
    {
       $Grades = Grade::all();
       return view('pages.Students.promotion.index',compact('Grades'));
    }

    public function store($request)
    {
        DB::beginTransaction();  // check if two tables are correct before add to database
        try{
       $students = Student::where('Grade_id',$request->Grade_id)->where('Classroom_id',$request->Classroom_id)->
       where('section_id',$request->section_id)->where('academic_year',$request->academic_year)->get();

       if ($students->count() < 1) {
         return redirect()->back()->with('error_promotions',__('لاتوجد بيانات في جدول الطلاب'));
       }
       // update in table students
       foreach ($students as $student) {
          $ids = explode(',',$student->id);
          Student::whereIn('id',$ids)->update([
            'Grade_id' => $request->Grade_id_new,
            'Classroom_id' => $request->Classroom_id_new,
            'section_id' => $request->section_id_new,
            'academic_year' => $request->academic_year_new,
          ]);
        // insert data in promotion
        promotion::updateOrCreate([
            'student_id'=>$student->id,
            'from_grade'=>$request->Grade_id,
            'from_classroom'=>$request->Classroom_id,
            'from_section'=>$request->section_id,
            'to_grade'=>$request->Grade_id_new,
            'to_classroom'=>$request->Classroom_id_new,
            'to_section'=>$request->section_id_new,
            'academic_year' => $request->academic_year,
            'academic_year_new' => $request->academic_year_new,
        ]);

       }
       DB::commit();  // insert data in database if two tables are correct
       toastr()->success(trans('messages.success'));
       return redirect()->back();
    }

       catch (\Exception $e){

        DB::rollBack();  // if there is an mistake in any table delete any adding data in db

        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }

    public function create()
    {
        $promotions = promotion::all();
        return view('pages.Students.promotion.management',compact('promotions'));
    }

    public function destroy($request)
    {
        try {

       if ($request->page_id == 1) {

           $promotions = promotion::all();

           // update in students table

           foreach ($promotions as $promotion) {
             $ids = explode(',',$promotion->student_id);

             Student::whereIn('id',$ids)->update([
                'Grade_id' => $promotion->from_grade,
                'Classroom_id' => $promotion->from_classroom,
                'section_id' => $promotion->from_section,
                'academic_year' => $promotion->academic_year,

             ]);

                // حذف جدول الترقيات
               promotion::truncate();

           }
           DB::commit();  // insert data in database if two tables are correct
           toastr()->success(trans('messages.Delete'));
           return redirect()->back();

       }else {
         $promotion = promotion::findOrFail($request->id);
         Student::where('id',$promotion->student_id)->update([
                'Grade_id' => $promotion->from_grade,
                'Classroom_id' => $promotion->from_classroom,
                'section_id' => $promotion->from_section,
                'academic_year' => $promotion->academic_year,

         ]);
         promotion::destroy($request->id);
         DB::commit();  // insert data in database if two tables are correct
         toastr()->success(trans('messages.Delete'));
         return redirect()->back();


       }
    }catch (\Exception $e){

        DB::rollBack();  // if there is an mistake in any table delete any adding data in db

        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

    }
}
