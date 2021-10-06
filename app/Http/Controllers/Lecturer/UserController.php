<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $lecturer = User::findOrFail(Auth::user()->id);
        $myMessages = Message::where('directed_to', Auth::user()->id)
                                ->where('status', 0)
                                ->orWhere('directed_to', 'all-lecturers')
                                ->latest()
                                ->get();
        $noOfMessages = Message::where('directed_to', Auth::user()->id)
                                ->where('status', 0)
                                ->orWhere('directed_to', 'all-lecturers')
                                ->count();
        return view('lecturer.user.user-profile', compact('lecturer', 'myMessages', 'noOfMessages'));
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
            'email'=>'required',
            'city'=>'required',
        ]);
        $lecturer = User::findOrFail(Auth::user()->id);
        $lecturer->name = $request->name;
        $lecturer->email = $request->email;
        $lecturer->city = $request->city;
        $lecturer->phone_no = $request->phone;
        $lecturer->about = $request->about;
        $lecturer->save();

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
