<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstructorUnit;
use App\Models\Message;
use App\Models\Payment;
use App\Models\Unit;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id', 2)
                        ->orderBy('name', 'asc')
                        ->get();
        $units = Unit::latest()->get();
        $uInstructs = InstructorUnit::orderBy('status', 'asc')->latest()->get();
        return view('admin.instructor-unit.index', compact('users', 'units', 'uInstructs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::latest()->get();
        $students = User::where('role_id', 3)->orderBy('name', 'asc')->get();
        return view('admin.instructor-unit.create', compact('units', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->msg_id == NULL) {
            
        } else {
            $msg = Message::findOrFail($request->msg_id);
            $msg->reply = 'Unit has been successfully assigned. <br/> Dana School';
            $msg->replied_by = Auth::user()->id;
            $msg->status = 1;
            $msg->save();
        }
        
        $this->validate($request, [
            'unit_id'=>'required',
            'user_id'=>'required'
        ]);

        $instructor = new InstructorUnit();
        $instructor->instructor_id = $request->user_id;
        $instructor->units_id = $request->unit_id;
        $instructor->created_by = Auth::user()->id;
        $instructor->access_upto = $request->date;
        $instructor->save();

        Toastr::success('Unit Successfully Assigned', 'Success :)');
        return redirect()->action([InstructorUnitController::class, 'index']);
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
    public function edit(Request $request, $id)
    {
        $unit = InstructorUnit::findOrFail($id);
        return view('admin.instructor-unit.edit', compact('unit'));
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
        if ($request->mark_complete == 1) 
        {
            $access_upto = date('Y-m-d');
        }else
        {
            $access_upto= $request->date;
        }

        $unit = InstructorUnit::findOrFail($id);
        $unit->access_upto = $access_upto;
        $unit->status = $request->mark_complete;
        $unit->save();

        Toastr::success('Unit access and details updated. ', 'Successful');
        return redirect()->route('admin.instructor-unit.index');
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
