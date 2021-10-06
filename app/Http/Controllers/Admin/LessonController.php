<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Excerise;
use App\Models\Lesson;
use App\Models\Unit;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::orderBy('unit_id', 'asc')->orderBy('title','asc')->get();
        return view('admin.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exercises = Excerise::where('status', 1)->latest()->get();
        $units = Unit::all();
        return view('admin.lesson.create', compact('exercises','units'));
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

        Toastr::success('Lesson Successfully Created', 'Successful :)');
        return redirect()->route('admin.lesson.index');
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
        return view('admin.lesson.show', compact('lesson'));
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
        $units = Unit::all();
        return view('admin.lesson.edit', compact('lesson','exercises','units'));
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

        Toastr::success('Lesson successfully updated', 'Successful :)');
        return redirect()->route('admin.lesson.show', $id);
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
