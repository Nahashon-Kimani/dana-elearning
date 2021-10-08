<?php

namespace App\Http\Controllers\lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Excerise;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = Excerise::orderBy('status', 'desc')
                                ->orderBy('title', 'asc')
                                ->latest()->get();
        return view('lecturer.exercise.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lecturer.exercise.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        $this->validate($request, [
            'title'=>'required',
            'content'=>'required'
        ]);

        $exercise = new Excerise();
        $exercise->title = $request->title;
        $exercise->slug = $request->title;
        $exercise->created_by = Auth::user()->id;
        $exercise->content = $request->content;
        $exercise->save();

        Toastr::success('Assignment Successfully Posted', 'Successs :)');
        return redirect()->route('lecturer.exercise.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $allExercises = Excerise::latest()->get();
        $exercise = Excerise::findOrFail($id);
        return view('lecturer.exercise.show', compact('exercise', 'allExercises'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exercise = Excerise::findOrFail($id);
        return view('lecturer.exercise.edit', compact('exercise'));
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
            'title'=>'required',
            'content'=>'required'
        ]);

        $exercise = Excerise::findOrFail($id);

        // If exercise was not created by the person editing, then create a new instance of the exercise. 
        if ($exercise->created_by != Auth::user()->id) {
             $exercise = new Excerise();
             $exercise->created_by = Auth::id();
        }

        $exercise->title = $request->title;
        $exercise->slug = $request->title;
        $exercise->content = $request->content;
        $exercise->save();
        
        return redirect()->route('lecturer.exercise.show', $id);
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
