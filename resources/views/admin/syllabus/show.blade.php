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
    <div class="col-md-9">
        <div class="card">
            <div class="card-header bg-info text-uppercase">
              <div class="row">
                <div class="col-sm-7">
                    <div class="card-title text-white">Associated unit: {{ $syllabus->units->name }}</div> 
                </div>
                <div class="col-sm-5">
                  @if ($syllabus->status == 0)
                  <form action="{{ route('admin.syllabus.approve', $syllabus->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="syllabus_id" value="{{ $syllabus->id }}">
                    <button type="submit" class="btn btn-warning btn-capitalize shadow-warning px-5 float-right btn-square">
                      <i class="fa fa-times"></i> approve
                    </button>
                  </form>
                  @else
                      <button disabled="disabled" class="btn btn-info shadow-info px-5 float-right btn-square">
                        <i class="fa fa-check"></i>
                        Approved
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
    <div class="col-md-3">
        <div class="card">
          <div class="card-header text-uppercase">Syllabus List</div>
           <div class="card-body">
              <div class="list-group">
                  @forelse ($syllabi as $key=>$allSyllabus)
                      <a href="{{ route('admin.syllabus.show',$allSyllabus->id) }}" 
                          class="list-group-item list-group-item-action">
                          <span class="badge badge-light shadow-light m-1 text-info">
                            @if ($allSyllabus->status == 0)
                                <span class="badge badge-warning">{{ $key + 1 }}</span>
                            @else
                                <span class="badge badge-info">{{ $key + 1 }}</span>
                            @endif
                          </span>
                          <small>
                            {{ Str::limit($allSyllabus->units->name, 18, '') }}
                          </small>
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