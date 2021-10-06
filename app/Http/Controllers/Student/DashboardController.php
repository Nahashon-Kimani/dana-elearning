<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseOutline;
use App\Models\Excerise;
use App\Models\InstructorUnit;
use App\Models\Lesson;
use App\Models\Message;
use App\Models\StudentCourse;
use App\Models\Unit;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->get();
        $myCourses = StudentCourse::where('student_id', Auth::user()->id)->latest()->get();
        $myCompletedCourses = StudentCourse::where([
                            ['student_id', Auth::user()->id],
                            ['status', 2]
                            ])->latest()->get();
        $units  = Unit::where('course_id', 1)->get();
        return view('student.dashboard', compact('courses','myCourses','myCompletedCourses', 'units'));
    }

    public function showCourse($id)
    {
        $course = Course::findOrFail($id);
        $units = Unit::where('course_id', '=', $id)->get();
        $outline = CourseOutline::where([
                            ['course_id', '=', $id], 
                            ['status', '=', 1]
                        ])->get();
        return view('student.show-course', compact('course', 'units'));
    }

    public function enrollCourse(Request $request, $id)
    {
        $newStudent = new StudentCourse();
        $newStudent->student_id = Auth::user()->id;
        $newStudent->course_id = $request->course_id;
        $newStudent->save();

        Toastr::success('You have successfull enrolled to the course', 'Congratulations');
        return redirect()->route('student.success');
    }

    public function success()
    {
        $course = StudentCourse::where('student_id', Auth::user()->id)
                    ->latest()
                    ->first();
        return view('student.success', compact('course'));
    }

    public function createMessage(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'details'=>'required'
        ]);

        $msg = new Message();
        $msg->title = $request->title;
        $msg->details = $request->details;
        $msg->asked_by = Auth::user()->id;
        $msg->save();

        return redirect()->back();
    }

    public function studentCourse()
    {
        $studentCourses = StudentCourse::where('student_id','=', Auth::user()->id)->latest()->get();
        return view('student.my-courses', compact('studentCourses'));
    }

    public function completedCourse()
    {
        $myCompletedCourses = StudentCourse::where([
                            ['student_id', Auth::user()->id],
                            ['status', 2]
                            ])->latest()->get();
        return view('student.completed-courses', compact('myCompletedCourses'));
    }

    public function courseUnit($id)
    {
        $units = Unit::where('course_id', $id)->get();
        return view('student.academics.index', compact('units'));
    }

    public function showUnit($id)
    {
        $unit = Unit::findOrFail($id);
        $lessons = Lesson::where('unit_id', $id)->orderBy('title', 'asc')->get();
        return view('student.academics.show-unit', compact('unit', 'lessons'));
    }

    public function showLessons($id)
    {
        $unit = Unit::findOrFail($id);
        $lessons = Lesson::where('unit_id', $id)->orderBy('title', 'asc')->get();
        return view('student.academics.lesson-list', compact('unit', 'lessons'));
    }

    public function viewLesson(Request $request, $id)
    {
        $unit = $request->unit_id;
        $lesson = Lesson::findOrFail($id);
        $lessons = Lesson::where('unit_id', $unit)->orderBy('title', 'asc')->paginate(10);
        return view('student.academics.view-lesson', compact('lesson', 'lessons'));
    }

    public function viewAssignment($id)
    {
        $exercise = Excerise::findOrFail($id);
        return view('student.academics.view-assignment', compact('exercise'));
    }

    public function nextLesson(Request $request, $id)
    {
        return $request->all();
    }

    // This method gets all the units assigned to the student
    public function units()
    {
        $myCourses = StudentCourse::where('student_id', Auth::user()->id)->latest()->get();
        $activeAllocatedUnits = InstructorUnit::where('instructor_id', Auth::user()->id)
                                                ->where('status', 0)
                                                ->latest()->get();
        $allocatedUnits =  InstructorUnit::where('instructor_id', Auth::user()->id)->latest()->get();
        $units = Unit::all();
        return view('student.academics.assigned-unit', compact('activeAllocatedUnits','myCourses','allocatedUnits', 'units'));
    }
}
