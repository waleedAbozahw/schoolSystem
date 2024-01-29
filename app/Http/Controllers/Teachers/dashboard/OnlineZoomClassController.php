<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\onlineClass;
use Illuminate\Http\Request;

class OnlineZoomClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $online_classes = onlineClass::where('created_by',auth()->user()->email)->get();
        return view('pages.Teachers.dashboard.online_classes.index',compact('online_classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['Grades'] = Grade::get();
        return view('pages.Teachers.dashboard.online_classes.indirect',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        onlineClass::create([
            'Grade_id'=>$request->Grade_id,
            'Classroom_id'=>$request->Classroom_id,
            'section_id'=>$request->section_id,
            'created_by'=>auth()->user()->email,
            'meeting_id'=>$request->meeting_id,
            'topic'=>$request->topic,
            'start_at'=>$request->start_time,
            'duration'=>$request->duration,
            'password'=>$request->password,
            'start_url'=>$request->start_url,
            'join_url'=>$request->join_url,
        ]);
        toastr()->success('message.success');
        return redirect()->route('online_zoom_classes.index');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        onlineClass::destroy($id);
        toastr()->success('messages.Delete');
        return redirect()->route('online_zoom_classes.index');
    }
}
