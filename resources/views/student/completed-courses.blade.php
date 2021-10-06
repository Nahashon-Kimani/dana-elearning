@extends('layouts.backend.index')

@section('content')

<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Simple Cards</h4>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javaScript:void();">Rocker</a></li>
        <li class="breadcrumb-item"><a href="javaScript:void();">Cards</a></li>
        <li class="breadcrumb-item active" aria-current="page">Simple Cards</li>
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
    <div class="col-lg-12">
      <div class="card-deck">
          @forelse ($myCompletedCourses as $course)
             <div class="col-sm-4">
                <div class="card card-info border border-info">
                    <img class="card-img-top" src="{{ asset('images/'.$course->courses->image_url) }}" alt="{{ $course->courses->name }}">
                <div class="card-body">
                    <h5 class="card-title text-info">{{ $course->courses->name }}</h5>
                    <p class="card-text">
                        {{ \Illuminate\Support\Str::limit($course->courses->summary, 220) }}
                    </p>
                </div>
                <div class="card-footer">
                  <small class="text-muted text-info">
                    Completed: {{ $course->updated_at->diffForHumans() }}
                  </small>
                </div>
               </div>
             </div>
          @empty
            <div class="card">
                <div class="card-header bg-warning text-uppercase text-white">no course Complete yet</div>
                <div class="card-body">
                <p class="card-text text-justify">
                    app.js is the parent component. 
                    react dev tool for chrome. 
                    npm start to start react project. in the package.json file. 
                    React has virtual DOM to reload page immediately. 
                    snippets es7. 
                    jsx 
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </div>
                <div class="card-footer">DANA SCHOOL</div>
            </div>
          @endforelse
       
      </div>
    </div>
  </div>

 @endsection