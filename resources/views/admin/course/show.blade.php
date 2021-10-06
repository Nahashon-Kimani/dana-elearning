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
  {{-- Short Summary --}}
  <div class="col-sm-7">
    <div class="card">
      <div class="card-header bg-warning text-white text-uppercase">Course Short Summary</div>
      <div class="card-body">
        <p class="card-text">
            {{ $course->summary }}
        </p>
      </div>
      <div class="card-footer text-uppercase">Dana school</div>
    </div>
  </div>

  {{-- Units under this course --}}
  <div class="col-sm-5">
    <div class="card">
      <div class="card-header bg-success text-white text-uppercase">Units under this Course</div>
      <div class="card-body">
          <div class="list-group">
              @foreach ($units as $key=>$unit)
                  <a href="#" class="list-group-item list-group-item-action disabled">{{ $unit->name }}</a>
              @endforeach
            </div>
      </div>
      <div class="card-footer">DANA SCHOOL</div>
    </div>
  </div>

</div>

 <div class="row">
    <div class="col-lg-9 col-sm-6 col-12">
      {{-- Main course description --}}
        <div class="card">
        <div class="card-header bg-info text-uppercase">
            <div class="card-title">{{ $course->name }}</div>
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

    <div class="col-lg-3 col-sm-6 col-12">
          <div class="card">
            <div class="card-header bg-warning text-white">Cost and Duration</div>
            <div class="card-body">
              <p class="card-text">Cost: Ksh. {{ $course->cost }}</p>
              <p class="card-text">Duration: {{ $course->duration }} Months</p>
            </div>
      <div class="card-footer text-uppercase">Dana school</div>
          </div>

          <div class="card">
            <div class="card-header bg-warning text-white">COURSE OUTLINE</div>
            <div class="card-body">
              @if ($course->course_outline == NULL)
                  <span class="badge badge-warning m-1">
                    <i class="fa fa-times">
                    <p class="text-center ml-2"> No Course outline attached.</p>
                  </i></span>
              @else
                <a href="{{ route('admin.course-outline.show', $course->course_outline) }}" 
                  title="{{ $course->name }} Course Outline"
                  target="_blank">
                  {{ $course->name }} Course Outline
                </a>
              @endif
            </div>
         <div class="card-footer text-uppercase">Dana school</div>
          </div>
    </div>
 </div>

 {{-- Second row with image and lesson times --}}
 <div class="row">
   {{-- Featured Image --}}
  <div class="col-sm-6">
    <div class="card">
      <div class="card-header bg-warning text-white">Featured Image</div>
      <div class="card-body">
          <img class="image-responsive img-thumbnail" src="{{ asset('images/'.$course->image_url) }}" alt="Featured Image">
      </div>
      <div class="card-footer text-uppercase">Dana school</div>
    </div>
  </div>

  {{-- Lesson times --}}
  <div class="col-sm-6">
    <div class="card">
      <div class="card-header bg-warning text-white">Lesson Times</div>
      <div class="card-body text-capitalize">
        <p class="card-text">Created by: {{ $course->user->name }}</p>
        <p class="card-text">Created at: {{ date('dS-M-Y', strtotime($course->created_at)) }}</p>
        <p class="card-text">
            Last Updated: {{ date('dS-M-Y', strtotime($course->updated_at)) }} 
            <span class="badge badge-warning m-1">{{ $course->updated_at->diffForHumans() }}</span>
        </p>
      </div>
      <div class="card-footer text-uppercase">Dana school</div>
    </div>
  </div>
 </div>
 {{-- End of the row --}}

@endsection