<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;
use App\Models\Grade;
use App\Models\onlineClass;
use Carbon\Carbon;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineClassController extends Controller
{
    use MeetingZoomTrait;

    public function index()
    {
        $online_classes = onlineClass::where('created_by',auth()->user()->email)->get();
        return view('pages.online_classes.index',compact('online_classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Grades = Grade::all();
        return view('pages.online_classes.add',compact('Grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

      //  $meeting = $this->createMeeting($request);
        try {

            $meeting = $this->createMeeting($request);

            onlineClass::create([

                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'created_by' => auth()->user()->email,
                'meeting_id' => $meeting->id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('online_classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }

    public function storeIndirect(Request $request)
    {

        try {

            onlineClass::create([

                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'created_by' => auth()->user()->email,
                'meeting_id' => $request->meeting_id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $request->duration,
                'password' => $request->password,
                'start_url' => $request->start_url,
                'join_url' => $request->join_url,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('online_classes.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }
    public function indirectCreate(){
        $Grades = Grade::all();
        return view('pages.online_classes.indirect',compact('Grades'));
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
    public function destroy(Request $request)
    {
        onlineClass::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('online_classes.index');
    }
}
