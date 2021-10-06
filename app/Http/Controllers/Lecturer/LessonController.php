<?php

namespace App\Http\Controllers\lecturer;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Excerise;
use App\Models\InstructorUnit;
use App\Models\Lesson;
use App\Models\Unit;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::where('created_by', '=', Auth::user()->id)
                            ->orderBy('unit_id', 'asc')
                            ->get();
        return view('lecturer.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exercises = Excerise::where('status', 1)->latest()->get();
        $units = InstructorUnit::where([
                        ['instructor_id', Auth::user()->id],
                        ['status', 0]
                        ])
                        ->latest()
                        ->get();
        return view('lecturer.lesson.create', compact('exercises','units'));
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
            'name'=>'required',
            'unit_id'=>'required',
            'obj'=>'required',
            'content'=>'required',
        ]);        

        $lesson = new Lesson();
        $lesson->title = $request->name;
        $lesson->slug = $request->name;
        $lesson->unit_id = $request->unit_id;
        $lesson->lesson_objectives = $request->obj;
        $lesson->featured_video = $request->video;
        $lesson->exercise_id = $request->exercise_id;
        $lesson->content = $request->content;
        $lesson->created_by = $request->created_by;
        $lesson->save();

        Toastr::success('Lesson Successfully Uploaded', 'Successful :)');
        return redirect()->route('lecturer.lesson.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('lecturer.lesson.show', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        $exercises = Excerise::all();
        $units = InstructorUnit::where([
                            ['status', 0],
                            ['instructor_id', Auth::user()->id]])
                            ->whereMonth('created_at', date('m'))
                            ->latest()
                            ->get();
        return view('lecturer.lesson.edit', compact('lesson','exercises','units'));
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
            'name'=>'required',
            'unit_id'=>'required',
            'obj'=>'required',
            'content'=>'required',
        ]);        

        $lesson = Lesson::findOrFail($id);
        $lesson->title = $request->name;
        $lesson->slug = $request->name;
        $lesson->unit_id = $request->unit_id;
        $lesson->lesson_objectives = $request->obj;
        $lesson->featured_video = $request->video;
        $lesson->exercise_id = $request->exercise_id;
        $lesson->content = $request->content;
        $lesson->created_by = $request->created_by;
        $lesson->save();

        Toastr::success('Lesson Successfully Updated', 'Successful :)');
        return redirect()->route('lecturer.lesson.show', $id);
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
