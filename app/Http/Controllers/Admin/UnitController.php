<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Scheme;
use App\Models\Syllabus;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::orderBy('course_id', 'asc')->orderBy('name', 'asc')->latest()->paginate(10);
        return view('admin.unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::latest()->get();
        $syllabi = Syllabus::where('status', 1)->latest()->get();
        $schemes = Scheme::where('status', 1)->latest()->get();
        return view('admin.unit.create', compact('courses', 'syllabi', 'schemes'));
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

        ]);

        $unit = new Unit();
        $unit->name = $request->name;
        $unit->slug = $request->name;
        $unit->desc = $request->desc;
        $unit->duration = $request->duration;
        $unit->course_id = $request->course_id;
        $unit->scheme_id = $request->scheme_id;
        $unit->syllabus_id = $request->syllabus_id;
        $unit->created_by = Auth::user()->id;
        $unit->save();

        return redirect()->route('admin.unit.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit = Unit::findOrFail($id);
        $lessons = Lesson::where('unit_id', $id)->orderBy('title', 'asc')->get();
        return view('admin.unit.show', compact('unit',  'lessons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        $courses = Course::latest()->get();
        $syllabi = Syllabus::where('status', 1)->latest()->get();
        $schemes = Scheme::where('status', 1)->latest()->get();
        return view('admin.unit.edit', compact('courses', 'syllabi', 'schemes', 'unit'));
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

            ]);
    
            $unit = Unit::findOrFail($id);
            $unit->name = $request->name;
            $unit->slug = $request->name;
            $unit->desc = $request->desc;
            $unit->duration = $request->duration;
            $unit->course_id = $request->course_id;
            $unit->scheme_id = $request->scheme_id;
            $unit->syllabus_id = $request->syllabus_id;
            $unit->created_by = Auth::user()->id;
            $unit->save();
    
            return redirect()->route('admin.unit.show', $id);
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
