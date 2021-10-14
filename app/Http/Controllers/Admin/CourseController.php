<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseOutline;
use App\Models\Subscription;
use App\Models\Syllabus;
use App\Models\Unit;
use App\Models\User;
use App\Notifications\NewCourseCreated;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->get();
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courseOutlines = CourseOutline::latest()->get();
        $courses = Course::latest()->get();
        $instructors = User::where('role_id', '=', 2)->latest()->get();
        return view('admin.course.create', compact('instructors', 'courseOutlines'));
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
            'name'=>'required',
            'instructor'=>'required',
            'duration'=>'required|integer|min:1',
            'price'=>'required|integer|min:1',
            'summary'=>'required',
            'details'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImage = time().'-'.$request->name.'.'.$request->image->extension();
        $request->image->move(public_path('images'), $newImage);

        $course = new Course();
        $course->name = $request->name;
        $course->user_id = $request->instructor;
        $course->duration = $request->duration;
        $course->cost = $request->price;
        $course->course_outline = $request->syllabus_id; 
        $course->summary = $request->summary;
        $course->image_url = $newImage;
        $course->desc = $request->details;
        $course->created_by = $request->created_by;
        $course->save();


        // Sending emails to the subscribers that a new course is available
        $subscribers = Subscription::all();
        foreach ($subscribers as  $subscriber) {
            Notification::route('mail', $subscriber->email)
                ->notify(new NewCourseCreated($course));
        }

        Toastr::success('Course Successfully Created', 'Success :)');
        return redirect()->route('admin.courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        $units = Unit::where('course_id', '=', $id)->get();
        $noOfUnits = Unit::where('course_id', '=', $id)->count();
        $outline = CourseOutline::where('course_id', $id)->latest()->first();
        return view('admin.course.show', compact('course', 'noOfUnits', 'units', 'outline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instructors = User::where('role_id', '=', 2);
        $course = Course::findOrFail($id);
        return view('admin.course.edit', compact('course', 'instructors'));
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
        $this->validate($request, [
            'name'=>'required',
            'instructor'=>'required',
            'duration'=>'required',
            'price'=>'required',
            'summary'=>'required',
            'details'=>'required'
        ]);

        $course = Course::findOrFail($id);
        $course->name = $request->name;
        $course->user_id = $request->instructor;
        $course->duration = $request->duration;
        $course->cost = $request->price;
        $course->course_outline = $request->syllabus_id; 
        $course->summary = $request->summary;
        $course->desc = $request->details;
        $course->created_by = $request->created_by;
        $course->save();

        Toastr::success('Course Successfully Created', 'Success :)');
        return redirect()->route('admin.courses.show', $id);
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
