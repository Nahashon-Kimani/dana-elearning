<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Payment;
use App\Models\Unit;
use App\Models\User;
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
        $users = User::latest()->get();
        $msgs = Message::orderBy('status', 'asc')->latest()->paginate(10);
        return view('admin.message.index', compact('msgs', 'users'));
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
        $this->validate($request, [
            'target_user'=>'required',
            'title'=>'required',
            'desc'=>'required'

        ]);

        $msg = new Message();
        $msg->directed_to = $request->target_user;
        $msg->title = $request->title;
        $msg->details = $request->desc;
        $msg->asked_by = AUth::user()->id;
        $msg->save();

        Toastr::success('Message Sent successfully', 'successfully Sent :)');
        return redirect()->back();
    }

    public function ignoreMessage(Request $request, $id)
    {
        $msg = Message::findOrFail($id);
        $msg->reply = '<p>Thank you for the Message. <br/> DANA SCHOOL </p>';
        $msg->replied_by = Auth::user()->id;
        $msg->status = 1;
        $msg->save();

        Toastr::success('Message successfully Ignored', 'Success :)');
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
        $msg = Message::findOrFail($id);
        $units = Unit::all();
        $payments  = Payment::where('paid_by', 3)->latest()->get();
        return view('admin.message.show', compact('msg', 'units', 'payments'));
    }

    // This function returns all the messages sent by students
    public function showStudentMessage(Request $request, $id)
    {
        $student = $request->student_id;
        $payments = Payment::where('paid_by', $student)->latest()->get();
        $msg  = Message::findOrFail($id);
        $units = Unit::all();
        return view('admin.message.show', compact('payments', 'msg', 'units'));
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
        $msg = Message::findOrFail($id);
        $msg->reply = $request->answer;
        $msg->replied_by = Auth::user()->id;
        $msg->status = 1;
        $msg->save();

        Toastr::success('Message successfully Replied', 'Success');
        return redirect()->route('admin.message.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
