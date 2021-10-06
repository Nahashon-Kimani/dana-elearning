<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\InstructorUnit;
use App\Models\Lesson;
use App\Models\Message;
use App\Models\Question;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $unAnsweredQuestion = Question::where('status', 0)->latest()->get();
        $lessonsUploaded = Lesson::where('created_by', Auth::user()->id)->count();
        /* $noOfMessages = Message::where('directed_to', Auth::user()->id)
                                ->where('status', 0)    
                                ->orWhere('directed_to', 'all-lecturers')
                                ->count();
        $noOfAllocatedUnits = InstructorUnit::where('instructor_id', Auth::user()->id)
                                ->where('status', 0)
                                ->count();
        */
        $myMessages = Message::where('directed_to', Auth::user()->id)
                                ->where('status', 0)
                                ->orWhere([['directed_to', 'all-lecturers'], ['status', 0]])
                                ->latest()
                                ->get();
        $allocatedUnits = InstructorUnit::where([
                                ['instructor_id', Auth::user()->id], 
                                ['status', 0]])
                                ->latest()
                                ->get();

        return view('lecturer.dashboard', 
                compact('lessonsUploaded', 'unAnsweredQuestion', 
                        'myMessages', 'allocatedUnits'));
    }

    // function to get all lecturers messages so that he/she can be able to read them.
    public function lecturerMessage()
    {
        
    }

    // This function is usedc for reading the exact message.
    public function readMessage($id)
    {
        $msg = Message::findOrFail($id);
        return view('lecturer.read-message', compact('msg'));
    }

    public function requestUnit(Request $request)
    {
        
        $msg = new Message();
        $msg->title = 'Request for a unit by '. Auth::user()->name;
        $msg->details = 'Hello. <br> This is ' . 
                        Auth::user()->name . 
                        ' a ' . Auth::user()->role->name. 
                        ' and am requesting to be assigned ' . $request->unit_id . 
                        ' in the month of '. $request->month_id.
                        ' <br/> '. 
                        'Thank you !';
        $msg->asked_by = Auth::user()->id;
        $msg->directed_to = 'all-admin';
        $msg->save();

        Toastr::success('Kindly wait for the admin response', 'Request Successful');
        return redirect()->back();
        
    }
}
