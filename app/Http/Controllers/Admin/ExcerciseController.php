<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Excerise;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class ExcerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = Excerise::orderBy('status')->latest()->get();
        return view('admin.exercise.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exercise.create');
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
            'title' => 'required',
            'content' => 'required'
        ]);

        $exercise = new Excerise();
        $exercise->title = $request->title;
        $exercise->slug = $request->title;
        $exercise->created_by = $request->created_by;
        $exercise->content = $request->content;
        $exercise->save();

        Toastr::success('Assignment Successfully Posted', 'Successs :)');
        return redirect()->route('admin.exercise.index');
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
        return view('admin.exercise.show', compact('exercise', 'allExercises'));
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
        return view('admin.exercise.edit', compact('exercise'));
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
            'title' => 'required',
            'content' => 'required'
        ]);

        $exercise = Excerise::findOrFail($id);


        Auth::user()->role_id;

        if ($exercise->created_by != Auth::id()) {
            $exercise = new Excerise();

            // If the authenticated user is admin, then approve the exercise otherwise leave it
            if (Auth::user()->role_id == 1) {
                $exercise->status = 1;
            } else {
                $exercise->status = 0;
            }
        }

        $exercise->title = $request->title;
        $exercise->slug = $request->title;
        $exercise->content = $request->content;
        $exercise->save();

        return redirect()->route('admin.exercise.show', $id);
    }

    // Approving the Exercise sent
    public function approve($id)
    {
        $exercise  = Excerise::findOrFail($id);
        $exercise->status = 1;
        $exercise->save();

        Toastr::success('Exercise successfully Approved', 'Success ;)');
        return redirect()->back();
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
