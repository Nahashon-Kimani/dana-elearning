<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Type;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::latest()->paginate(3);
        return view('admin.question.index', compact('questions'));
    }

    public function pending()
    {
        $questions = Question::where('status', 0)->latest()->get();
        return view('admin.question.index', compact('questions'));
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
        $qn = Question::findOrFail($id);
        return view('admin.question.edit', compact('qn'));
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
        return redirect()->route('admin.question.index');
    }

    public function ignoreQuestion(Request $request, $id)
    {
        $qn = Question::findOrFail($id);
        $qn->status = 1;
        $qn->answer = 'Noted. Thank you.';
        $qn->answered_by = Auth::user()->id;
        $qn->save();

        Toastr::success('Queston Successfully Ignored', 'Success :)');
        return redirect()->route('admin.question.index');
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
