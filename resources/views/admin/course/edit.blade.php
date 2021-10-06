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
    <div class="col-lg-11 mx-auto">
        <hr>
       <div class="card">
         <div class="card-body">
           <div class="card-title">Vertical Form with square input</div>
           <hr>
            <form action="{{ route('admin.courses.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
             <div class="form-row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="input-13">Course Name</label>
                        <input type="text" name="name" class="form-control form-control-square" id="input-13" value="{{ $course->name }}">
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="input-14">Instructor</label>
                                    <select name="instructor" class="form-control" id="basic-select">
                                        <option value="{{ $course->user_id }}" selected>{{ $course->user->name }}</option>
                                        @foreach ($instructors as $instructor)
                                            <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                                        @endforeach
                                    </select>
                               </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="input-14">DURATION</label>
                                <input name="duration" type="text" class="form-control form-control-square" id="input-14" value="{{ $course->duration }}">
                               </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="input-14">Price</label>
                                <input name="price" type="text" class="form-control form-control-square" id="input-14" value="{{ $course->cost }}">
                               </div>
                        </div>
                    </div>
                </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="basic-textarea">Course Summary</label>
                            <textarea name="summary" rows="4" class="form-control">{{ $course->summary }}</textarea>
                          </div>
                </div>
             </div>
             <hr>

             
             <hr>
             <div class="form-group">
                <label for="basic-textarea">Course description</label>
                <textarea name="details" rows="4" class="form-control" id="summernote">{!! $course->desc !!}</textarea>
              </div>

             <div class="form-group">
                 <a href="{{ route('admin.courses.index') }}" class="btn btn-warning shadow-warning btn-square px-5">Cancel</a>
              <button type="submit" class="btn btn-info shadow-info btn-square px-5">Update</button>
            </div>
            </form>
         </div>
       </div>
    </div>
 </div>
       

@endsection