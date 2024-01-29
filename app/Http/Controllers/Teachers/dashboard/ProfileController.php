<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $information = Teacher::findOrFail(auth()->user()->id);
        return view('pages.Teachers.dashboard.profile',compact('information'));
    }

    public function update(Request $request,$id){
        $information = Teacher::findOrFail($id);
        if (!empty($request->password)) {
           $information->Name=['ar'=>$request->Name_ar,'en'=>$request->Name_en];
           $information->password=Hash::make($request->password);
           $information->save();
        }
        else {
            $information->Name=['ar'=>$request->Name_ar,'en'=>$request->Name_en];
            $information->save();
        }
        toastr()->success('messages.Update');
        return redirect()->back();
    }
}
