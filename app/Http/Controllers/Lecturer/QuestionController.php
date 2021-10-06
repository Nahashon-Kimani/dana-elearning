<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Question;
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
        // Display questions that are not answered or have been answered by the exact lecturer.
        /* $qns = Question::where('status', 0)
                        ->orWhere('answered_by', Auth::user()->id)
                        ->orderBy('course_id', 'asc')
                        ->orderBy('status', 'asc')
                        ->latest()->get();
        */
        $qns = Question::where('status', 0)->orderBy('created_at')->latest()->get();
        return view('lecturer.question.index', compact('qns'));
    }

    // Getting the answered questions
    public function answered()
    {
        $qns = Question::where('status', 1)
                        ->orderBy('course_id', 'asc')
                        ->latest()->get();
        return view('lecturer.question.questions', compact('qns'));
    }

    // getting all questions
    public function allQuestion()
    {
        $qns = Question::orderBy('course_id', 'asc')
                        ->orderBy('status', 'desc')
                        ->latest()->get();
        return view('lecturer.question.questions', compact('qns'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);
        return view('lecturer.question.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $qn = Question::findOrFail($id);
        return view('lecturer.question.edit', compact('qn'));
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
            'answer'=>'required'
        ]);
        
        $qn = Question::findOrFail($id);
        $qn->answered_by = Auth::user()->id;
        $qn->answer = $request->answer;
        $qn->status = 1;
        $qn->save();

        Toastr::success('Queston Successfully answered', 'Success :)');
        return redirect()->route('lecturer.question.index');
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
