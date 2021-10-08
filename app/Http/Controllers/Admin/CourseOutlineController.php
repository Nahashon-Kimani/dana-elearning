<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseOutline;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CourseOutlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlines = CourseOutline::latest()->get();
        return view('admin.course-outline.index', compact('outlines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::latest()->get();
        return view('admin.course-outline.create', compact('courses'));
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
            'course_id'=>'required|integer',
            'desc'=>'required'
        ]);

        $courseOutline = new CourseOutline();

        // if the course outline is posted by an admin, then its by default approved
        if (Auth::user()->role_id == 1) {
            $courseOutline->status = 1;
        }

        $courseOutline->course_id = $request->course_id;
        $courseOutline->slug = Str::slug($request->course_id);
        $courseOutline->desc = $request->desc;
        $courseOutline->created_by = Auth::user()->id;
        $courseOutline->save();

        return redirect()->route('admin.course-outline.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $outline = CourseOutline::findOrFail($id);
        return view('admin.course-outline.show', compact('outline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $outline = CourseOutline::findOrFail($id);
        $courses = Course::latest()->get();
        return view('admin.course-outline.edit', compact('outline', 'courses'));
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
            'course_id'=>'required|integer',
            'desc'=>'required'
        ]);

        $courseOutline = CourseOutline::findOrFail($id);
        $courseOutline->course_id = $request->course_id;
        $courseOutline->slug = $request->course_id;
        $courseOutline->desc = $request->desc;
        $courseOutline->created_by = Auth::user()->id;
        $courseOutline->save();

        return redirect()->route('admin.course-outline.show', $id);
    }

    public function approve($id)
    {
        $outline = CourseOutline::findOrFail($id);
        $outline->status = 1;
        $outline->save();

        Toastr::success('Successfully Approved', 'Success');
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
