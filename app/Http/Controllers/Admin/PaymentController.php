<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Course;
use App\Models\Payment;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::orderBy('status', 'asc')->latest()->paginate(10);
        $allCourses = Course::all();
        $students = User::where('role_id', 3)->latest()->get();
        $totalPayments = Payment::sum('amount');
        return view('admin.payment.index', compact('payments', 'allCourses', 'students', 'totalPayments'));
    }

    // Getting individual student payment report
    public function studentPayments($id)
    {
        $user_name = User::findOrFail($id);
        $payments = Payment::where('paid_by', $id)->orderBy('status', 'asc')->latest()->paginate(10);
        $allCourses = Course::all();
        $students = User::where('role_id', 3)->latest()->get();
        $totalPayments = Payment::where('paid_by', $id)->sum('amount');
        $noOfPayments = Payment::where('paid_by', $id)->count();
        return view('admin.payment.individual-student', compact('payments','user_name','noOfPayments', 'allCourses', 'students', 'totalPayments'));
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
            'student_id'=>'required',
            'course_id'=>'required',
        ]);

        if (isNull($request->mpesa_code)) {
           $mpesaCode = 'CASH-'.Str::random(6);
        } else {
            $mpesaCode = $request->mpesa_code;
        }

        $pay = new Payment();
        $pay->mpesa_code = $mpesaCode;
        $pay->courses_id = $request->course_id;
        $pay->amount = 0;
        $pay->paid_by = $request->student_id;
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
        $pay = Payment::findOrFail($id);
        return view('admin.payment.show', compact('pay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pay = Payment::findOrFail($id);
        return view('admin.payment.edit', compact('pay'));
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
        $pay = Payment::findOrFail($id);
        $pay->amount = $request->amount;
        $pay->authorised_by = Auth::user()->id;
        $pay->status = 1;
        $pay->save();

        Toastr::success('Payment Successfully received and authorised', 'Success :)');
        return redirect()->route('admin.payments.show', $id);
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
