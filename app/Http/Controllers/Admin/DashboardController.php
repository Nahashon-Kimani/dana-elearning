<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Message;
use App\Models\Payment;
use App\Models\Question;
use App\Models\Scheme;
use App\Models\Syllabus;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $noOfCourses = Course::count();
        $students = User::where([['role_id', '=', 3], ['created_at', date('m')]])->count();
        $lecturers = User::where('role_id', '=', 3)->count();
        $users = User::orderBy('role_id', 'desc')->latest()->paginate(20);
        $lessons = Lesson::count();
        $unAnsweredQuestion = Question::where('status', 0)->count();
        // $messages = Message::where('status', 0)->count();
        $newMessages = Message::where('status', 0)->latest()->paginate(3);
        $pendingPayments = Payment::where([['amount', '=', 0], ['status', '=', 0]])->latest()->paginate(3);
        $unApprovedSchemes = Scheme::where('status', 0)->count();
        $unApprovedSyllabus = Syllabus::where('status', 0)->count();
        $pendingQuestions = Question::where('status', 0)->count();
        $newUsers = User::whereMonth('created_at', date('m'))->count();
        $revenue = Payment::whereMonth('updated_at', date('m'))->sum('amount');


        return view('admin.dashboard', 
            compact('users', 'noOfCourses', 'students', 'lecturers', 'lessons', 
            'unAnsweredQuestion', 'newMessages', 'pendingPayments', 'unApprovedSchemes', 
            'unApprovedSyllabus', 'pendingQuestions', 'newUsers', 'revenue'));
    }
}
