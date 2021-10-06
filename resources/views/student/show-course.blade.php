@extends('layouts.backend.index')
@section('content')

<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Bootstrap Elements</h4>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javaScript:void();">Rocker</a></li>
        <li class="breadcrumb-item"><a href="javaScript:void();">UI Elements</a></li>
        <li class="breadcrumb-item active" aria-current="page">Bootstrap Elements</li>
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


 <div class="row">
    <div class="col-lg-9 col-sm-6 col-12">
        {{-- Short Summary --}}
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header bg-warning  text-uppercase p-4">
                        <p class="h4 text-white">{{ $course->name }} Short Summary</p>
                    </div>
                    <div class="card-body">
                      <p class="card-text">
                          {{ $course->summary }}
                      </p>
                    </div>
                    <div class="card-footer text-uppercase">Dana school</div>
                  </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header bg-warning text-uppercase p-4">
                        <p class="h4 text-white">{{ $course->name }} course outline</p>
                    </div>
                    <div class="card-body">
                      <p class="card-text">
                        {!! $course->outlines->desc !!}
                          {{-- @if ()
                            {!! $course->outlines->desc !!}
                          @else
                            <p class="text-center">Coming Soon</p>
                          @endif --}}
                      </p>
                    </div>
                    <div class="card-footer text-uppercase">Dana school</div>
                  </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6 col-12">
        {{-- Units --}}
          <div class="card">
            <div class="card-header bg-success text-white text-uppercase">Units under this Course</div>
            <div class="card-body">
                <div class="list-group">
                    @foreach ($units as $key=>$unit)
                        <a href="#" class="list-group-item list-group-item-action disabled">{{ $unit->name }}</a>
                    @endforeach
                  </div>
            </div>
            <div class="card-footer text-uppercase">Dana School</div>
          </div>

          {{-- Cost and duration --}}
          <div class="card">
            <div class="card-header bg-warning text-white">Cost and Duration</div>
            <div class="card-body">
              <p class="card-text">Cost: Ksh. {{ $course->cost }}</p>
              <p class="card-text">Duration: {{ $course->duration }} Months</p>
            </div>
                <div class="card-footer text-uppercase">Dana school</div>
          </div>


          {{-- Instructor --}}
          <div class="card">
            <div class="card-header bg-success text-white text-uppercase"> {{ $course->name }} Course Instructor</div>
            <div class="card-body">
                <img src="{{ asset('images/users/'.$course->user->profile_picture) }}" 
                    alt="Instructor" class="img-responsive"> <br>
                <p class="h5">Name: {{ $course->user->name }}</p>
            </div>
            <div class="card-footer text-uppercase">Dana School</div>
          </div>
    </div>
 </div>

 <div class="row">
     <div class="col-sm-12 mx-auto">
           {{-- course description --}}
        <div class="card">
            <div class="card-header bg-info text-uppercase">
                <div class="card-title">
                  <p class="card-title h2">
                    {{ $course->name }} course description
                  </p>
                </div>
            </div>

            <div class="card-body">
                <p class="card-text text-justify">
                    {!! $course->desc !!}
                </p>
            </div>
            <div class="card-footer">
                <p class="h5 text-uppercase text-center">Dana School</p>
            </div>
        </div>
     </div>
 </div>

@endsection