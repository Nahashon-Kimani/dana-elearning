<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Question;
use App\Models\StudentCourse;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myCourses = StudentCourse::where(
                        [['student_id', Auth::user()->id],
                        ['status', 1]])
                        ->latest()->get();
        $questions = Question::where('created_by', Auth::user()->id)->latest()->paginate(1);
        return view('student.questions.index', compact('questions', 'myCourses'));
    }

    public function allQuestions()
    {
        $questions = Question::latest()->paginate(1);
        $myCourses = StudentCourse::where(
                        [['student_id', Auth::user()->id],
                        ['status', 1]])
                        ->latest()
                        ->get();
        return view('student.questions.index', compact('questions', 'myCourses'));
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
        // return dd($request->all());
        $this->validate($request, [
            'title'=>'required',
            'desc'=>'required',
            'course_id'=>'required'
        ]);

        $question = new Question();
        $question->subject = $request->title;
        $question->details = $request->desc;
        $question->course_id = $request->course_id;
        $question->created_by = Auth::user()->id;
        $question->save();

        Toastr::success('Successfully sent', 'Success :)');
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
        $question = Question::findOrFail($id);
        $question->delete();

        Toastr::success('Question Successfully deleted :)', 'Success');
        return redirect()->back();
    }
}
