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
    <div class="col-sm-11 offset-sm-1">
        <hr>
        <form action="{{ route('lecturer.question.update', $qn->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="card">
            <div class="card-header">
              <div class="card-title text-uppercase text-info">
                <u>Question Title: {{ $qn->subject }}</u> 
                <small> on {{ $qn->courses->name }}</small>
              </div>
                <div class="card-title text-uppercase">Asked By: {{ $qn->users->name }}</div>
               <div class="card-title text-uppercase">Asked on: {{ date('dS-M-Y', strtotime($qn->created_at)) }}</div>
            </div>
            <div class="card-body">
                
            <p class="text-justify text-warning">
              {!! $qn->details !!}
            </p>

            <div class="form-group">
              <label for="input-2">Answer Here</label>
              <textarea name="answer" id="summernote" cols="30" rows="10"></textarea>
             </div>
            
           </div>
            <div class="card-footer">
              <div class="form-group">
                <a href="{{ route('lecturer.question.index') }}" class="btn btn-warning shadow-warning btn-square px-5">Cancel</a>
                <button type="submit" class="btn btn-info shadow-info btn-square px-5"><i class="icon-lock"></i> Answer</button>
              </div>
            </div>
          </div>
         </form>
    </div>
</div>


 @endsection