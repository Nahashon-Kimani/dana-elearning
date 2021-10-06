@extends('layouts.backend.index')

@section('content')

{{-- Welcome Note --}}
<div class="row">
    <div class="col-sm-10 mx-auto">
        <div class="card">
          <div class="card-header text-white text-uppercase">
              <h1 class="text-center">Welcome Back</h1>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-sm-2 border-right">
                        <img src="{{ asset('images/users/'.Auth::user()->profile_picture) }}" 
                            class="img-responsive img-thumbnail" alt="Profile Picture"><br>
                       <h5> {{ Auth::user()->name }}</h5>
                </div>

                <div class="col-sm-7 border-right">
                    <h4 class="text-center text-uppercase">Dana School</h4>
                    <p class="text-center">
                        Learn New Skills to go ahead for Your CareerWe can support student forum 
                        24/7 for national and international students. Lorem ipsum dolor sit amet, 
                        consectetur adipisicing elit.</p>
                </div>

                <div class="col-sm-3">
                    <div class="btn-group-vertical m-1">
                        <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="modal" data-target="#newPayment"> New Payment</button>
                        {{-- <a  href="{{ route('student.student-course') }}" class="btn btn-warning waves-effect waves-light">My courses</a> --}}
                        <a href="{{ route('student.units') }}" class="btn btn-warning waves-effect waves-light">My Units</a>
                        <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="modal" data-target="#message">Send Message</button>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
</div>

<h4 class="text-uppercase text-center">{{ Auth::user()->name }} Dashboard</h4>
    <hr>
      <div class="row">
        <div class="col-lg-12">
           <div class="card">
              <div class="card-body"> 
                <ul class="nav nav-tabs nav-tabs-info nav-justified">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#Mycourses">
                        <i class="icon-home"></i> 
                        <span class="hidden-xs">My Courses</span>
                    </a>
                  </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#allcourses">
                        <i class="icon-envelope-open"></i> 
                        <span class="hidden-xs">All Courses</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#completedcourses">
                        <i class="icon-envelope-open"></i> 
                        <span class="hidden-xs">Completed Courses</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#messages">
                        <i class="icon-envelope-open"></i> 
                        <span class="hidden-xs">Ask a Question</span>
                    </a>
                </li>
                
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    {{-- My courses --}}
                    <div id="Mycourses" class="container tab-pane active">
                        <div class="card">
                            <div class="card-header text-uppercase bg-info">
                                <h5 class="card-title">My Courses</h5>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                               <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">COURSE</th>
                                      <th scope="col">ENROLLMENT DATE</th>
                                      <th scope="col">STATUS</th>
                                      <th scope="col">RESUME</th>
                                    </tr>
                                  </thead>
                                    <tbody>
                                        @foreach ($myCourses as $key=>$myCourse)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <a href="{{ route('student.show-course',$myCourse->course_id) }}">
                                                    {{ $myCourse->courses->name }}</a>
                                                </td>
                                                <td>{{ date('dS-F-Y h:i:s', strtotime($myCourse->created_at)) }}</td>
                                                <td>
                                                    @if ($myCourse->status == 1)
                                                        <span class="badge badge-warning shadow-warning m-1">On-going</span>
                                                    @else
                                                        <span class="badge badge-info shadow-info m-1">Complete</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($myCourse->status == 1)
                                                        {{-- <a href="{{ route('student.course-unit', $myCourse->course_id) }}" class="btn btn-info">Resume Course</a> --}}
                                                        <button class="btn btn-info m-1" data-toggle="modal" data-target="#requestUnit">Request Unit</button>
                                                    @else
                                                        <span class="badge badge-info shadow-info m-1">Complete</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                  <tfoot>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">COURSE</th>
                                        <th scope="col">ENROLLMENT DATE</th>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">RESUME</th>
                                      </tr>
                                  </tfoot>
                                </table>
                            </div>
                            </div>
                          </div>
                    </div>

                    {{-- All courses --}}
                    <div id="allcourses" class="container tab-pane fade">
                        <h1 class="text-center text-warning text-uppercase">View our Courses</h1>
                        <div class="row">
                            @foreach ($courses as $course)
                                <div class="col-sm-4">
                                    <div class="card card-info">
                                        <img src="{{ asset('images/'.$course->image_url) }}" class="card-img-top" alt="Card image cap">
                                            <div class="card-body">
                                                <p class="card-title h4 text-info text-uppercase">{{ $course->name }}</p>
                                                    <p class="card-text">
                                                        {{ \Illuminate\Support\Str::limit($course->summary, 180) }}
                                                    </p>

                                            <ul class="list-group list-group-flush list shadow-none">
                                                <li class="list-group-item d-flex justify-content-between align-items-center">Cost: Ksh. <span class="badge badge-dark badge-pill">{{ $course->cost }}</span></li>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">Duration: <span class="badge badge-success badge-pill">{{ $course->duration }} Months</span></li>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">Instructor: <span class="badge badge-danger badge-pill">{{ $course->user->name }}</span></li>
                                            </ul>
                                            
                                            <hr>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <a href="{{ route('student.show-course', $course->id) }}" class="btn btn-inverse-info waves-effect waves-light m-1"><i class="fa fa-globe mr-1"></i> Read More</a>
                                                    </div>

                                                    <div class="col-sm-6">  
                                                        <form action="{{ route('student.enroll-course', $course->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                            <button class="btn btn-info waves-effect waves-light m-1">
                                                                <i class="fa fa-star mr-1"></i> Enroll Now
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> 
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Question --}}
                    <div id="messages" class="container tab-pane fade">
                        <div class="card">
                            <div class="card-body">
                            <div class="card-title text-uppercase">Ask a Question</div>
                            <hr>
                            <form action="{{ route('student.question.store') }}" method="POST">
                                @csrf

                               <div class="form-row">
                                <div class="form-group col-sm-6">
                                    <label for="input-13">Question Title</label>
                                    <input name="title" class="form-control form-control-square" type="text"  id="input-13" placeholder="Question Title">
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="input-13">Select Course</label>
                                    <select name="course_id" class="form-control form-control-square">
                                        <option disabled selected>-- Select Course --</option>
                                        <option disabled>_____________________________</option>
                                        @foreach ($myCourses as $myCourse)
                                            <option value="{{ $myCourse->course_id }}">{{ $myCourse->courses->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                               </div>

                                    <div class="form-group">
                                        <label for="input-14">Question Details</label>
                                        <textarea name="desc" id="summernote" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-warning shadow-warning m-1 btn-square px-5">Reset</button>
                                        <button type="submit" class="btn btn-primary shadow-primary m-1 btn-square px-5">
                                            <i class="icon-lock"></i> Upload
                                        </button>
                                    </div>
                                    </form>
                            </div>
                        </div>
                    </div>

                    {{-- completed courses --}}
                    <div id="completedcourses" class="container tab-pane fade">
                        <div class="card">
                            <div class="card-header text-uppercase bg-success">
                                <h5 class="card-title">My Completed Courses</h5>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                               <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">COURSE</th>
                                      <th scope="col">ENROLLED DATE</th>
                                      <th scope="col">COMPLETED AT</th>
                                    </tr>
                                  </thead>

                                    <tbody>
                                        @foreach ($myCompletedCourses as $key=>$myCompletedCourse)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $myCompletedCourse->courses->name }}</td>
                                                <td>{{ date('dS-F-Y h:i:s', strtotime($myCourse->created_at)) }}</td>
                                                <td>{{ date('dS-F-Y h:i:s', strtotime($myCourse->updated_at)) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody> 

                                 <tfoot>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">COURSE</th>
                                        <th scope="col">ENROLLED DATE</th>
                                        <th scope="col">COMPLETED AT</th>
                                      </tr>
                                 </tfoot>
                                </table>
                            </div>
                            </div>
                          </div>
                    </div>
                    
                </div>
              </div>
           </div>

        </div>
      </div><!--End Row-->
    

      {{-- Message Modal --}}
      <div class="modal fade" id="message">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-warning">
            <div class="modal-header bg-warning">
              <h5 class="modal-title text-white text-uppercase"><i class="fa fa-star"></i> Send us a message</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                 
<div class="card-body">
	<div class="card-title text-uppercase">Post new message</div>
	<hr>
		<form action="{{ route('student.message.store') }}" method="POST">
            @csrf
			<div class="form-group">
				<label for="input-13">Message Title</label>
				<input type="text" name="title" class="form-control form-control-square" id="input-13" placeholder="Enter Message Title" required>
				</div>
				<div class="form-group">
					<label for="input-14">Message body</label>
                    <textarea name="details" class="form-control form-control-square" rows="5" required></textarea>
					</div>
				</div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-inverse-warning" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              <button type="submit" class="btn btn-warning"><i class="fa fa-check-square-o"></i> Post</button>
            </div>
            </form>
          </div>
        </div>
      </div><!--End Modal -->

      {{-- Request a Unit by student modal after enrolling for a course --}}
      <div class="modal fade" id="requestUnit" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-info">
            <div class="modal-header bg-info">
              <h5 class="modal-title text-white"><i class="fa fa-star"></i> Reuest for a unit</h5>
              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form action="{{ route('student.message.request-unit') }}" method="post">
                @csrf
             <div class="modal-body">
                 <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="input-13"> Select Month </label>
                        <select name="month_id" id="" class="form-control form-control-square">
                            <option value="{{ date('F') }}" selected>{{ date('F') }}</option>
                            {{-- @for ($i = 1; $i < 13; $i++)
                                <option value="{{ $i }}">{{ date('F', strtotime($i + 1)) }}</option>
                            @endfor --}}
                            <option disabled>_____________</option>
                            <option> January</option>
                            <option> February</option>
                            <option> March</option>
                            <option> April</option>
                            <option> May</option>
                            <option> June</option>
                            <option> July</option>
                            <option> August</option>
                            <option> September</option>
                            <option> October</option>
                            <option> November</option>
                            <option> December</option>
                        </select>
                       </div>
    
                       <div class="form-group col-sm-6">
                        <label for="input-13"> Select Unit </label>
                        <select name="unit_id" id="" class="form-control form-control-square">
                            <option selected disabled>-- Select Suggest Unit --</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->name }}">{{ $unit->name }}</option>
                            @endforeach
                        </select>
                       </div>
    
                 </div>
             </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-inverse-info" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="submit" class="btn btn-info"><i class="fa fa-check-square-o"></i> Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    
    
       {{-- Payment Modal --}}
  <div class="modal fade" id="newPayment" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-info">
        <div class="modal-header bg-info">
          <h5 class="modal-title text-white"><i class="fa fa-star"></i> Modal title</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{ route('student.payments.store') }}" method="post">
          @csrf
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="input-13"> M-Pesa Transaction Code </label>
                <input name="mpesa_code" type="text" class="form-control form-control-square text-uppercase" required placeholder="PXD0123456TY">
               </div>

               <div class="form-group col-sm-6">
                <label for="input-13"> Select Course </label>
                <select name="course_id" id="" class="form-control form-control-square">
                    <option selected disabled>-- Select Course --</option>
                    @foreach ($myCourses as $course)
                        <option value="{{ $course->course_id }}">{{ $course->courses->name }}</option>
                    @endforeach
                </select>
               </div>

         </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-inverse-info" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
          <button type="submit" class="btn btn-info"><i class="fa fa-check-square-o"></i> Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>

    
@endsection