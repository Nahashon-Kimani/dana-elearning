<?php

namespace App\Http\Controllers\lecturer;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Syllabus;
use App\Models\Unit;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $syllabi = Syllabus::where('created_by', '=', Auth::user()->id)->latest()->get();
        return view('lecturer.syllabus.index', compact('syllabi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::latest()->get();
        $courses = Course::latest()->get();
        return view('lecturer.syllabus.create', compact('courses', 'units'));
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
            'unit_id' =>'required',
            'description'=>'required'
        ]);

        $syllabus = new Syllabus();
        $syllabus->unit_id = $request->unit_id;
        $syllabus->desc = $request->description;
        $syllabus->created_by = Auth::user()->id;
        $syllabus->save();

        Toastr::success('Syllabus Successfully Created', 'Successful :)');
        return redirect()->route('lecturer.syllabus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $syllabi = Syllabus::where('created_by', Auth::user()->id)->get();
        $syllabus = Syllabus::findOrFail($id);
        return view('lecturer.syllabus.show', compact('syllabus', 'syllabi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $syllabus = Syllabus::findOrFail($id);
        $units = Unit::latest()->get();
        return view('lecturer.syllabus.edit', compact('syllabus', 'units'));
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
            'unit_id' =>'required',
            'description'=>'required'
        ]);

        $syllabus = Syllabus::findOrFail($id);
        $syllabus->unit_id = $request->unit_id;
        $syllabus->desc = $request->description;
        $syllabus->created_by = Auth::user()->id;
        $syllabus->save();

        Toastr::success('Syllabus Successfully Updated', 'Successful :)');
        return redirect()->route('lecturer.syllabus.show', $id);
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
