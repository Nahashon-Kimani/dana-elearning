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
    <div class="col-sm-9">
    <hr>
       <div class="card">
           <div class="card-header bg-info p-3 text-uppercase text-white">
                <div class="card-title">Unit: {{ $lesson->units->name }} <br> {{ $lesson->title }}</div>
           </div>
         <div class="card-body">
           <p class="text-justify">
               {!! $lesson->content !!}
           </p>
         </div>
       </div>
    </div>

    <div class="col-sm-3">
        <hr>
        <div class="card">
            <div class="card-header bg-warning text-white">LESSON OBJECTIVES</div>
            <div class="card-body">
              <p class="card-text text-justify">
                  {{ $lesson->lesson_objectives }}
              </p>
            </div>
      <div class="card-footer">DANA SCHOOL</div>
          </div>

          <div class="card">
            <div class="card-header bg-info text-white">LESSON EXERCISE</div>
            <div class="card-body">
              <p class="card-text">
                  @if ($lesson->exercise_id == NULL)
                    <span class="badge badge-warning m-1">No ASSIGNMENT attached</span>
                  @else
                    {{ $lesson->exercise->title }}
                  @endif
              </p>
            </div>
      <div class="card-footer">DANA SCHOOL</div>
          </div>


          <div class="card">
            <div class="card-header bg-warning text-uppercase text-white">Featured Video</div>
            <div class="card-body">
              <p class="card-text">
                <iframe width="200"
                src="https://www.youtube.com/embed/mtexXWkV830" 
                title="YouTube video player" frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; 
                encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen></iframe>

                  {{-- <a href="{{ $lesson->featured_video }}" 
                    title="{{ $lesson->title }} Video"
                    class="btn btn-info shadow-info px-5">
                    Preview Here
                  </a> --}}
              </p>
            </div>
      <div class="card-footer">DANA SCHOOL</div>
          </div>


          <div class="card">
            <div class="card-header bg-warning text-white text-uppercase">lesson dates</div>
            <div class="card-body">
              <p class="card-text text-capitalize">
                  <p>Created By: {{ $lesson->user->name }}</p>
                  <p>Created On: {{ date('dS-M-Y', strtotime($lesson->created_at)) }}</p>
                  <p>
                      Last Updated: {{ date('dS-M-Y', strtotime($lesson->updated_at)) }}
                      <span class="badge badge-primary shadow-primary m-1">
                          {{ $lesson->updated_at->diffForHumans() }}
                        </span>
                  </p>
              </p>
            </div>
      <div class="card-footer">DANA SCHOOL</div>
          </div>
    </div>
 </div>

 @endsection