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
    <div class="col-sm-9 mx-auto">
        <div class="card">
            <div class="card-header bg-info text-white text-uppercase"> Start Learning:  </div>
            <div class="card-body">
                <div class="list-group">
                    {{-- The first is a link to view unit outline redirecting to show unit route --}}
                    <a href="{{ route('student.show-unit', $unit->id) }}" 
                        class="list-group-item list-group-item-action active d-flex justify-content-between align-items-center"
                        target="_blank">
                        {{ $unit->name }} (Unit Outline)
                        <span class="badge badge-warning badge-pill">Unit Outline.</span>
                    </a>
                    @forelse ($lessons as $key=>$lesson)
                        {{-- <a href="{{ route('student.view-lesson', $lesson->id) }}" 
                            class="list-group-item list-group-item-action justify-content-between align-items-center">
                            <span class="badge badge-warning m-1 badge-pill">{{ $key + 1 }}</span>
                            {{ $lesson->title }} 
                        </a>  --}}
                        <form action="{{ route('student.view-lesson', $lesson->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="unit_id" value="{{ $unit->id }}">
                            <button type="submit" 
                                class="list-group-item list-group-item-action justify-content-between align-items-center">
                                <span class="badge badge-warning m-1 badge-pill">{{ $key + 1 }}</span>
                                {{ $lesson->title }}
                            </button>
                        </form>
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