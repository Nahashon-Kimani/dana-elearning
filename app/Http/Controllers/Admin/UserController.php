<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Message;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noOfCourses = Course::count();
        $students = User::where('role_id', '=', 3)->count();
        $lecturers = User::where('role_id', '=', 3)->count();
        $users = User::orderBy('role_id', 'desc')->latest()->get();
        $lessons = Lesson::count();
        $unAnsweredQuestion = Question::where('status', 0)->count();
        $messages = Message::where('status', 0)->count();
        return view('admin.dashboard', compact('users', 'noOfCourses','messages', 'students', 'lecturers', 'lessons', 'unAnsweredQuestion'));
    }

    // getting admins
    public function admin()
    {
        $noOfCourses = Course::count();
        $students = User::where('role_id', '=', 3)->count();
        $lecturers = User::where('role_id', '=', 3)->count();
        $users = User::where('role_id', 1)->latest()->paginate(20);
        $lessons = Lesson::count();
        $messages = Message::where('status', 0)->count();
        $unAnsweredQuestion = Question::where('status', 0)->count();
        return view('admin.user-category', compact('users', 'noOfCourses', 'messages', 'students', 'lecturers', 'lessons', 'unAnsweredQuestion'));
    }

    //getting all lecturers
    public function lecturers()
    {
        $noOfCourses = Course::count();
        $students = User::where('role_id', '=', 3)->count();
        $lecturers = User::where('role_id', '=', 3)->count();
        $users = User::where('role_id', 2)->latest()->paginate(20);
        $lessons = Lesson::count();
        $messages = Message::where('status', 0)->count();
        $unAnsweredQuestion = Question::where('status', 0)->count();
        return view('admin.user-category', compact('users', 'noOfCourses', 'messages','students', 'lecturers', 'lessons', 'unAnsweredQuestion'));
    }

      //getting all lecturers
      public function students()
      {
          $noOfCourses = Course::count();
          $students = User::where('role_id', '=', 3)->count();
          $lecturers = User::where('role_id', '=', 3)->count();
          $users = User::where('role_id', 3)->latest()->paginate(20);
          $lessons = Lesson::count();
          $messages = Message::where('status', 0)->count();
          $unAnsweredQuestion = Question::where('status', 0)->count();
          return view('admin.user-category', compact('users', 'noOfCourses', 'messages','students', 'lecturers', 'lessons', 'unAnsweredQuestion'));
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'role_id'=>'required',
            'email'=>'required',
            'phone_no'=>'required',
            'password'=>'required',
            'image'=>'mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImage = time().'-'.$request->name.'.'.$request->image->extension();
        $request->image->move(public_path('images/users'), $newImage);
        
        $user = new User();
        $user->name = $request->name;
        $user->slug = $request->name;
        $user->role_id = $request->role_id;
        $user->email =$request->email;
        $user->profile_picture = $newImage;
        $user->about = $request->abouts;
        $user->phone_no = $request->phone_no;
        $user->city = $request->city;
        $user->password = Hash::make($request->password);
        $user->save();

        Toastr::success('User Created Successfully', 'Successfully Added');
        return redirect()->route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $myMessages = Message::where('directed_to', $id)
                                ->where('status', 0)
                                ->orWhere('directed_to', 'all-lecturers')
                                ->latest()
                                ->get();
        $noOfMessages = Message::where('directed_to', $id)
                                ->where('status', 0)
                                ->orWhere('directed_to', 'all-lecturers')
                                ->count();
        return view('admin.user.show', compact('user', 'myMessages', 'noOfMessages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
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
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->slug = $request->name;
        $user->role_id = $request->role_id;
        $user->email =$request->email;
        $user->about = $request->about;
        $user->phone_no = $request->phone_no;
        $user->city = $request->city;
        $user->password = Hash::make($request->password);
        $user->save();

        Toastr::success('User Created Successfully', 'Successfully Added');
        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //+
    }
}
