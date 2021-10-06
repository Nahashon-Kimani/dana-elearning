<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\StudentCourse;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Unit;
use Brian2694\Toastr\Facades\Toastr;

class WebsiteController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->get();
        $trendingCourses = Course::offset(0)
                                ->limit(4)
                                ->latest()
                                ->get();
        $allCourses = Course::count();
        $teachers = User::where('role_id', '=', 2)
                    ->offset(0)->limit(3)->latest()->get();
        return view('welcome', compact('trendingCourses','courses','allCourses', 'teachers'));
    }

    public function about()
    {
        return view('website.about'); 
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function course()
    {
        $courses = Course::latest()->paginate(4);
        $allCourses = Course::count();
        return view('website.course', compact('courses', 'allCourses'));
    }

    public function singleCourse()
    {
        return view('website.single-courses');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required'
        ]);

        $subscription = new Subscription();
        $subscription->name = $request->name;
        $subscription->email = $request->email;
        $subscription->save();

        return redirect()->back();
    }

    public function instructors()
    {
        $instructors = User::where('role_id', '=', 2)->latest()->get();
        return view('website.instructors', compact('instructors'));
    }

    public function showCourse($id)
    {
        $course = Course::findOrFail($id);
        // $lessons = Lesson::where('course_id', '=', $id)->count();
        $studentsEnrolled = StudentCourse::where('course_id', $id)->count();
        $units = Unit::where('course_id', '=', $id)->count();
        return view('website.single-courses', compact('course', 'units', 'studentsEnrolled'));
    }

    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'msg_subject'=>'required',
            'message'=>'required'
        ]);

        $msg = new ContactUs();
        $msg->name = $request->name;
        $msg->email = $request->email;
        $msg->phone_no = $request->phone;
        $msg->subject = $request->msg_subject;
        $msg->message = $request->message;
        $msg->save();

        Toastr::success('Message successfully sent', 'Successfully :)');
        return redirect()->back();
    }
}
