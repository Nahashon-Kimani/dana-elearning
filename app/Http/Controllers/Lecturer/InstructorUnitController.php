<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\InstructorUnit;
use App\Models\Lesson;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InstructorUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Should we use monthly view or student view
        * I have used monthly viewand status = 0; 
        */
        $activeAllocatedUnits = InstructorUnit::where([
                                ['status', 0],
                                ['instructor_id', Auth::user()->id]])
                                ->latest()
                                ->get();
        $allocatedUnits = InstructorUnit::where('instructor_id', Auth::user()->id)->latest()->get();
        $units = Unit::all();
        return view('lecturer.instructor-unit.index', compact('activeAllocatedUnits', 'allocatedUnits', 'units'));
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
        $unit = InstructorUnit::findOrFail($id);
        // SELECT * FROM `lessons` INNER JOIN instructor_units WHERE lessons.unit_id = instructor_units.units_id
        // $lessons = Lesson::where('unit_id', );
        // $lessons = Lesson::join('instructor_units', 'lessons.unit_id', '=', 'instructor_units.units_id')->get();
        $lessons = DB::table('lessons')
                        ->join('instructor_units', 'lessons.unit_id', '=', 'instructor_units.units_id')
                        ->get();
        return view('lecturer.show-unit', compact('unit', 'lessons'));
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
        //
    }
}
