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
           <div class="card-title text-uppercase">created new exercise</div>
           <hr>
            <form action="{{ route('admin.exercise.store') }}" method="POST">
                @csrf

                <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
             <div class="form-group">
              <label for="input-13">Title</label>
              <input name="title" type="text" class="form-control form-control-square" id="input-13" placeholder="Enter Your Name">
             </div>
             
             <div class="form-group">
              <label for="input-15">Assignment Content</label>
              <textarea name="content" id="summernote" rows="4"></textarea>
             </div>
           
             <div class="form-group">
                 <a href="{{ route('admin.exercise.index') }}" class="btn btn-warning shadow-warning btn-square px-5 text-uppercase">Cancel</a>
              <button type="submit" class="btn btn-info shadow-info btn-square px-5 text-uppercase"><i class="icon-lock"></i> Post</button>
            </div>
            </form>
         </div>
       </div>
       

@endsection