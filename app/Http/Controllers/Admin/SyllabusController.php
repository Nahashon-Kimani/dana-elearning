<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Syllabus;
use App\Models\Unit;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $syllabi = Syllabus::orderBy('status', 'asc')->latest()->paginate(20);
        return view('admin.syllabus.index', compact('syllabi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::latest()->get();
        $units = Unit::latest()->get();
        return view('admin.syllabus.create', compact('courses', 'units'));
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
        $syllabus->created_by = $request->created_by;
        $syllabus->save();

        Toastr::success('Syllabus Successfully Created', 'Successful :)');
        return redirect()->route('admin.syllabus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $syllabi = Syllabus::latest()->get();
        $syllabus = Syllabus::findOrFail($id);
        return view('admin.syllabus.show', compact('syllabus', 'syllabi'));
    }

    public function app($id)
    {
        $scheme = Syllabus::findOrFail($id);
        $scheme->status = 1;
        $scheme->save();

        Toastr::success('Successfully Approved', 'Successful :)');
        return redirect()->back();
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
        $units = Unit::all();
        return view('admin.syllabus.edit', compact('syllabus', 'units'));
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
        $syllabus->created_by = $request->created_by;
        $syllabus->save();

        Toastr::success('Syllabus Successfully Updated', 'Successful :)');
        return redirect()->route('admin.syllabus.show', $id);
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

    // Approve a specified syllabus 
    
    public function approve(Request $request, $id)
    {
        $syllabus = Syllabus::findOrFail($id);
        $syllabus->status = 1;
        $syllabus->save();

        Toastr::success('Successfully approved', 'Success');
        return redirect()->back();
    }
}
