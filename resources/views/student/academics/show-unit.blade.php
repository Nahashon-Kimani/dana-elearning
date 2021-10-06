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
    {{-- Course Outline --}}
        <div class="col-sm-8">
            <div class="card">
            <div class="card-header bg-info text-white">
                <p class="h3 text-center text-uppercase">{{ $unit->name }} </p>
                <p class="h5">Unit under: {{ $unit->courses->name }} Course</p>
                <p class="h5">Duration: {{ $unit->duration }}</p>

                </div>
            <div class="card-body">
                <p class="card-text">
                    {!! $unit->desc !!}
                </p>
            </div>
            <div class="card-footer text-uppercase">dana school</div>
            </div>
        </div>
      

      <div class="col-sm-4 mx-auto">
        <div class="card">
            <div class="card-header bg-info text-white text-uppercase"> Start Learning:  </div>
            <div class="card-body">
                <div class="list-group">
                    {{-- The first is a link to view unit outline --}}
                    {{-- <a href="#" class="list-group-item list-group-item-action">{{ $unit->name }} </a>  --}}
                    @forelse ($lessons as $lesson)
                        <a href="{{ route('student.view-lesson', $lesson->id) }}" 
                            class="list-group-item list-group-item-action">
                            {{ $lesson->title }} 
                        </a> 
                    @empty
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <div class="alert-icon contrast-alert">
                            <i class="icon-info"></i>
                            </div>
                            <div class="alert-message">
                            <span><strong>Info!</strong> No Uploaded Lesson.</span>
                            </div>
                        </div> 
                    @endforelse
                  </div>
            </div>
            <div class="card-footer text-center text-uppercase">dana school</div>
          </div>
      </div>
</div>


@endsection