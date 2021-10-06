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
    <div class="col-lg-11 mx-auto">
    <hr>
       <div class="card">
         <div class="card-body">
           <div class="card-title text-uppercase">
             Edit 
              <strong>
                <span class="text-info">{{ $outline->courses->name }} </span>
              </strong> Course Outline
            </div>
           <hr>
            <form action="{{ route('admin.course-outline.update', $outline->id) }}" method="POST">
                @csrf
                @method('PUT')

             <div class="form-group">
              <label for="input-13">Associated Course</label>
              <select name="course_id" class="form-control form-control-square">
                  <option value="{{ $outline->course_id }}" selected>{{ $outline->courses->name }}</option>
                  <option disabled>______________________</option>

                  @foreach ($courses as $course)
                      <option value="{{ $course->id }}">{{ $course->name }}</option>
                  @endforeach
              </select>
             </div>
             
             <div class="form-group">
              <label for="input-15">Paste Scheme of Work here</label>
              <textarea name="desc" id="summernote" rows="5">
                {!! $outline->desc !!}
              </textarea>
             </div>
             <div class="form-group">
                 <a href="{{ route('admin.scheme.index') }}" class="btn btn-danger shadow-danger btn-square px-5">Cancel</a>
               <button type="submit" class="btn btn-primary shadow-primary btn-square px-5"><i class="icon-lock"></i> Update</button>
            </div>
            </form>
         </div>
       </div>
       


@endsection