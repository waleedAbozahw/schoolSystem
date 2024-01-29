<?php
namespace App\Repositary;

use App\Models\Fee_invoice;
use App\Models\Fees;
use App\Models\Grade;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class FeeInvoicesRepository implements FeeInvoicesInterface{

    public function index()
    {
        $Fee_invoices = Fee_invoice::all();
        $Grades = Grade::all();
        return view('pages.Fees_Invoices.index',compact('Fee_invoices','Grades'));
    }

    public function show($id)
    {
       $student = Student::findOrFail($id);
       $fees =Fees::where('Classroom_id',$student->Classroom_id)->get();
       return view('pages.Fees_Invoices.add',compact('student','fees'));
    }

    public function store($request)
    {
        $List_Fees = $request->List_Fees;

        DB::beginTransaction();

        try {

            foreach ($List_Fees as $List_Fee) {
                // حفظ البيانات في جدول فواتير الرسوم الدراسية
                $Fee_invoice = new Fee_invoice();
                $Fee_invoice->invoice_date = date('Y-m-d');
                $Fee_invoice->student_id = $List_Fee['student_id'];
                $Fee_invoice->Grade_id = $request->Grade_id;
                $Fee_invoice->Classroom_id = $request->Classroom_id;
                $Fee_invoice->fee_id = $List_Fee['fee_id'];
                $Fee_invoice->amount = $List_Fee['amount'];
                $Fee_invoice->description = $List_Fee['description'];
                $Fee_invoice->save();

                // حفظ البيانات في جدول حسابات الطلاب
                $StudentAccount = new StudentAccount();
                $StudentAccount->date = date('Y-m-d');
                $StudentAccount->type = 'invoice';
                $StudentAccount->fee_invoice_id = $Fee_invoice->id;
                $StudentAccount->student_id = $List_Fee['student_id'];
                $StudentAccount->Debit = $List_Fee['amount'];
                $StudentAccount->credit = 0.00;
                $StudentAccount->description = $List_Fee['description'];
                $StudentAccount->save();
            }

            DB::commit();

            toastr()->success(trans('messages.success'));
            return redirect()->route('FeesInvoices.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $fee_invoices = Fee_invoice::findOrFail($id);
        $fees = Fees::where('Classroom_id',$fee_invoices->Classroom_id)->get();
        return view('pages.Fees_Invoices.edit',compact('fee_invoices','fees'));
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {
            // تعديل البيانات في جدول فواتير الرسوم الدراسية
            $Fee_invoice = Fee_invoice::findorfail($request->id);
            $Fee_invoice->fee_id = $request->fee_id;
            $Fee_invoice->amount = $request->amount;
            $Fee_invoice->description = $request->description;
            $Fee_invoice->save();

            // تعديل البيانات في جدول حسابات الطلاب
            $StudentAccount = StudentAccount::where('fee_invoice_id',$request->id)->first();
            $StudentAccount->Debit = $request->amount;
            $StudentAccount->description = $request->description;
            $StudentAccount->save();
            DB::commit();

            toastr()->success(trans('messages.Update'));
            return redirect()->route('FeesInvoices.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
          Fee_invoice::destroy($request->id);
          toastr()->success(trans('messages.Delete'));
          return redirect()->back();

    }

}
