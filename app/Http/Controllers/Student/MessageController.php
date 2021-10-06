<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $msgs = Message::where('asked_by', Auth::user()->id)->latest()->get();
        return view('student.message.index', compact('msgs'));
    }

    // Getting messages directed to me or my group
    public function myMessages()
    {
        $msgs = Message::where('directed_to', Auth::user()->id)
                        ->orWhere('directed_to', 'all-students')
                        ->latest()->get();
        return view('student.message.my-message', compact('msgs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'title'=>'required',
            'details'=>'required'
        ]);

        $msg = new Message(); 
        $msg->title = $request->title;
        $msg->details = $request->details;
        $msg->asked_by = Auth::user()->id;
        $msg->save();

        // Toastr::success('Syllabus Successfully Created', 'Successful :)', ["positionClass" => "toast-top-center"]);
        Toastr::success('Message Successfully sent', 'Successful :)');
        return redirect()->route('student.message.index');
    }

    // This method is used by students to reequest for units
    // fuction to request a unit
    public function requestUnit(Request $request)
    {
        $msg = new Message();
        $msg->title = 'Request for a unit by '. Auth::user()->name;
        $msg->details = 'Hello. <br> This is <b>' . 
                        Auth::user()->name . 
                        '</b> a ' . Auth::user()->role->name. 
                        ' and am requesting to be assigned <b>' . $request->unit_id . 
                        '</b> in the month of <b>'. $request->month_id.
                        '</b> <br/> '. 
                        'Thank you!';
        $msg->asked_by = Auth::user()->id;
        $msg->directed_to = 'all-admin';
        $msg->save();

        Toastr::success('Kindly wait for the admin response', 'Request Successful');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $msg = Message::findOrFail($id);
        $msg->delete();
        
        Toastr::success('Message Successfully Deleted', 'Successful :)');
        return redirect()->back();
    }
}
