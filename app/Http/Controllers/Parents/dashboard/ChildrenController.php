<?php

namespace App\Http\Controllers\Parents\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Degree;
use App\Models\Fee_invoice;
use App\Models\MyParent;
use App\Models\receipt_student;
use App\Models\Student;
use App\Models\Teacher;
use App\Repositary\ReceiptStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChildrenController extends Controller
{
    public function index(){
        $students = Student::where('parent_id',auth()->user()->id)->get();
        return view('pages.parents.children.index',compact('students'));
    }

    public function children_results($id){

        $student = Student::findOrFail($id);

        if ($student->parent_id !== auth()->user()->id) {
            toastr()->error('يوجد خطا في كود الطالب');
            return redirect()->route('sons_index');

        }

        $degrees = Degree::where('student_id',$id)->get();
        if ($degrees->isEmpty()) {
            toastr()->error('لا توجد نتائج لهذاالطالب');
            return redirect()->route('sons_index');
        }
        return view('pages.parents.degrees.index',compact('degrees'));

      }

      public function children_attendance(){

        $students = Student::where('parent_id',auth()->user()->id)->get();
        return view('pages.parents.Attendance.index',compact('students'));
      }

      public function children_attendance_search(Request $request){

        $request->validate([
            'from' => 'required|date|date_format:Y-m-d',
            'to' => 'required|date|date_format:Y-m-d|after_or_equal:from'
        ], [
            'to.after_or_equal' => 'تاريخ النهاية لابد ان اكبر من تاريخ البداية او يساويه',
            'from.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
            'to.date_format' => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
        ]);


        $students = Student::where('parent_id', auth()->user()->id)->get();
        $student_ids = Student::where('parent_id', auth()->user()->id)->pluck('id');

        if ($request->student_id == 0) {

            $Students = Attendance::whereBetween('attendance_date', [$request->from, $request->to])->whereIn('student_id',$student_ids)->get();
            return view('pages.parents.Attendance.index', compact('Students', 'students'));
        } else {

            $Students = Attendance::whereBetween('attendance_date', [$request->from, $request->to])
                ->where('student_id', $request->student_id)->get();
            return view('pages.parents.Attendance.index', compact('Students', 'students'));

        }
      }

      public function children_fees(){
          $student_ids = Student::where('parent_id',auth()->user()->id)->pluck('id');
          $Fee_invoices = Fee_invoice::whereIn('student_id',$student_ids)->get();
          return view('pages.parents.fees.index',compact('Fee_invoices'));
      }

      public function children_receipt($id){

        $student = Student::findOrFail($id);

        if ($student->parent_id !== auth()->user()->id) {
            toastr()->error('يوجد خطا في كود الطالب');
            return redirect()->route('children_fees');
        }

        $receipt_students = receipt_student::where('student_id',$id)->get();

        if ($receipt_students->isEmpty()) {
            toastr()->error('لا توجد مدفوعات لهذاالطالب');
            return redirect()->route('children_fees');
        }

        return view('pages.parents.Receipt.index',compact('receipt_students'));
      }

      public function parent_profile(){
         $information = MyParent::findOrFail(auth()->user()->id);
        return view('pages.parents.profile',compact('information'));
      }

      public function update_parent_profile(Request $request){
         $information = MyParent::findOrFail(auth()->user()->id);
         if (empty($request->password)) {
            $information->Name_Father=['ar'=> $request->Name_ar, 'en'=> $request->Name_en];
            $information->save();
         }else{
            $information->Name_Father=['ar'=> $request->Name_ar, 'en'=> $request->Name_en];
            $information->password = Hash::make($request->password);
            $information->save();

         }
        toastr()->success('Update');
        return redirect()->back();
      }



    }

