<?php
namespace App\Repositary;

use App\Models\Fees;
use App\Models\Grade;

class FeesRepositary implements FeesInterface{

   public function index(){
    $fees = Fees::all();
     return view('pages.fees.index',compact('fees'));
   }

   public function create(){
    $Grades = Grade::all();
    return view('pages.fees.add',compact('Grades'));
   }

   public function store($request){
    $fees = new Fees();
    $fees->title = ['ar'=>$request->title_ar, 'en'=>$request->title_en];
    $fees->amount = $request->amount;
    $fees->Grade_id = $request->Grade_id;
    $fees->Classroom_id = $request->Classroom_id;
    $fees->description = $request->description;
    $fees->year = $request->year;
    $fees->Fee_type = $request->Fee_type;
    $fees->save();

    toastr()->success('messages.success');
    return redirect()->back();


   }
   public function update($request){
      Fees::where('id',$request->id)->update([
        'title'=> ['ar'=>$request->title_ar, 'en'=>$request->title_en],
        'amount' => $request->amount,
        'Grade_id' => $request->Grade_id,
        'Classroom_id' => $request->Classroom_id,
        'description' => $request->description,
        'year' => $request->year,
        'Fee_type' => $request->Fee_type,
      ]);
        toastr()->success('messages.success');
        return redirect()->back();

   }

   public function edit($id){
    $fee = Fees::findOrFail($id);
    $Grades = Grade::all();
     return view('pages.fees.edit',compact('fee','Grades'));
   }

   public function destroy($request){

     Fees::where('id',$request->id)->delete();

     toastr()->success('messages.Delete');
     return redirect()->back();

   }
   public function show(){

   }

}
