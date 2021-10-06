@extends('layouts.backend.index')

@section('content')

<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Blank Page</h4>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javaScript:void();">Rocker</a></li>
        <li class="breadcrumb-item"><a href="javaScript:void();">Pages</a></li>
        <li class="breadcrumb-item active" aria-current="page">Blank Page</li>
     </ol>
   </div>
   <div class="col-sm-3">
   <div class="btn-group float-sm-right">
    <button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Setting</button>
    <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">
    <span class="caret"></span>
    </button>
    <div class="dropdown-menu">
      <a href="javaScript:void();" class="dropdown-item">Action</a>
      <a href="javaScript:void();" class="dropdown-item">Another action</a>
      <a href="javaScript:void();" class="dropdown-item">Something else here</a>
      <div class="dropdown-divider"></div>
      <a href="javaScript:void();" class="dropdown-item">Separated link</a>
    </div>
  </div>
 </div>
 </div>


 <div class="row p-5">
     <div class="col-sm-9 mx-auto">
         <h2 class="text-center text-bold">
            {{ Auth::user()->name }} Congratulations! You are now enrolled in {{ $course->courses->name }}
         </h2>

      <div class="card card-info border-top border-info">
          <div class="card-body">
              <div class="card-text text-justify">
                <h5 class="text-bolder">Pursue the Verified</h5> 
                <p> Track Highlight your new knowledge and skills with 
                a verified certificate. Use this valuable credential to improve your 
                job prospects and advance your career, or highlight your certificate 
                in school applications.</p> 
                
                <p class="lead text-bolder"> Benefits of the Verified Track </p>
                <ul>
                    <li>
                        <b>Unlimited Course Access: </b>
                        Learn at your own pace, and access materials anytime to brush up on what you've learned. 
                    </li>

                    <li>
                        <b>Graded Assignments:</b> 
                        Build your skills through graded assignments and projects. 
                    </li>

                    <li>
                        <b>Easily Sharable:</b> 
                        Add the certificate to your CV or resume, or post it directly on LinkedIn.
                    </li>

                    <li>
                        <b>Support our Mission: </b>
                        EdX, a non-profit, relies on verified certificates to help fund affordable education to everyone globally.
                    </li>
                </ul>
                
                <hr>

              </div>
             
              <div class="text-right">
                {{-- <a href="#" class="btn btn-info m-1 text-capitalize"><i class="fa fa-eye"></i> View Course Outline</a> --}}
                <a href="{{ route('student.payments.index') }}" class="btn btn-info m-1 text-capitalize">
                    <i class="fa fa-money-bill-alt"></i>  
                    Proceed to payment
                </a>
              </div>
          </div>
      </div>

     </div>
 </div>



 @endsection