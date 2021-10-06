<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\StudentCourse;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pays = Payment::where('paid_by', Auth::user()->id)->latest()->paginate(10);
        $totalPay = Payment::where('paid_by', Auth::user()->id)->sum('amount');
        $myCourses = StudentCourse::where('student_id', Auth::user()->id)->latest()->get();
        return view('student.payment.index', compact('pays', 'myCourses', 'totalPay'));
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
        $this->validate($request, [
            'mpesa_code'=>'required|max:10|min:10',
            'course_id'=>'required',
        ]);

        $pay = new Payment();
        $pay->mpesa_code = $request->mpesa_code;
        $pay->courses_id = $request->course_id;
        $pay->amount = 0;
        $pay->paid_by = Auth::user()->id;
        $pay->save();

        Toastr::success('Payment Successfully Created', 'Successful :)');
        return redirect()->back();
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
