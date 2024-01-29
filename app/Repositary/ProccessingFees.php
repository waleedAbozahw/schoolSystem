<?php
namespace App\Repositary;

use App\Models\ProcessingFees;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class ProccessingFees implements ProccessingFeesInterface{

    public function index(){
        $ProcessingFees = ProcessingFees::all();
        return view('pages.ProcessingFee.index',compact('ProcessingFees'));
    }

    public function show($id){
        $student = Student::findOrFail($id);
        return view('pages.ProcessingFee.add',compact('student'));
    }

    public function edit($id){
         $ProcessingFee = ProcessingFees::findOrFail($id);
         return view('pages.ProcessingFee.edit',compact('ProcessingFee'));
    }

    public function store($request){
        DB::beginTransaction();
        try {
            //حفظ بيانات في جدول معالجة الرسوم
            $processingFees = new ProcessingFees();
            $processingFees->date=date('Y-m-d');
            $processingFees->student_id=$request->student_id;
            $processingFees->amount=$request->Debit;
            $processingFees->description=$request->description;
            $processingFees->save();


          //حفظ البيانات في جدول حساب الطالب
            $studentAcount = new StudentAccount();
            $studentAcount->date=date('Y-m-d');
            $studentAcount->type='precessingFees';
            $studentAcount->processing_id=$processingFees->id;
            $studentAcount->student_id=$request->student_id;
            $studentAcount->Debit=0.00;
            $studentAcount->credit=$request->Debit;
            $studentAcount->description=$request->description;
            $studentAcount->save();

            DB::commit();
            toastr()->success('messages.success');
            return redirect()->route('ProcessingFees.index');

        } catch (\Exception $e) {

           DB::rollBack();
           return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }

    }

    public function update($request){
        DB::beginTransaction();
        try {
            //تعديل بيانات في جدول معالجة الرسوم
            $processingFees = ProcessingFees::findOrFail($request->id)->update([
                'amount'=>$request->Debit,
                'description'=>$request->description,
             ]);

          //تعديل البيانات في جدول حساب الطالب
            $studentAcount = StudentAccount::where('student_id',$request->student_id)->
            where('processing_id',$request->id)->update([
                'credit'=>$request->Debit,
                'description'=>$request->description,
            ]);

            DB::commit();
            toastr()->success('messages.Update');
            return redirect()->route('ProcessingFees.index');

        } catch (\Exception $e) {

           DB::rollBack();
           return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }

    }

    public function destroy($request){
          ProcessingFees::destroy($request->id);
          toastr()->success('messages.Delete');
          return redirect()->route('ProcessingFees.index');
    }

}
