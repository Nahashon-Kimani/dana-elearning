@extends('layouts.backend.index')
@section('content')

<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">List Groups</h4>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javaScript:void();">Rocker</a></li>
        <li class="breadcrumb-item"><a href="javaScript:void();">UI Elements</a></li>
        <li class="breadcrumb-item active" aria-current="page">List Groups</li>
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
        <div class="card">
            <div class="card-header bg-info py-3 text-uppercase">
              <div class="row">
                <div class="col-sm-7">
                  <p class="card-title text-white">Unit: {{ Str::upper($syllabus->units->name) }} </p>
                </div>
                <div class="col-sm-5">
                  @if ($syllabus->status == 0)
                    <button type="button" class="btn btn-outline-warning btn-square waves-effect waves-light m-1 float-right">
                      <i class="fa fa-times"></i> Not Approved
                    </button>
                  @else
                    <button type="button" class="btn btn-info btn-square waves-effect waves-light m-1 float-right" disabled>
                      <i class="fa fa-check"></i> Approved
                    </button>
                  @endif
                </div>
              </div>
            </div>
            <div class="card-body">
              <p class="card-text pl-2">
                  {!! $syllabus->desc !!}
              </p>
            </div>
      <div class="card-footer">DANA SCHOOL</div>
          </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
          <div class="card-header text-uppercase">My Syllabus List</div>
           <div class="card-body">
              <div class="list-group">
                  @forelse ($syllabi as $key=>$allSyllabus)
                      <a href="{{ route('lecturer.syllabus.show',$allSyllabus->id) }}" 
                          class="list-group-item list-group-item-action">
                          @if ($allSyllabus->status == 0)
                              <span class="badge badge-warning">{{ $key + 1 }}</span>
                          @else
                              <span class="badge badge-info">{{ $key + 1 }}</span>
                          @endif
                          {{ $allSyllabus->units->name }}
                      </a>
                  @empty
                      <a href="#" class="list-group-item list-group-item-action">No Syllabus Yet</a>
                  @endforelse  
                  </div>
           </div>
        </div>
      </div>
 </div>

@endsection