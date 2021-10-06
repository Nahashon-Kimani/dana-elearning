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


 <div class="col-lg-12 table-cell">
  <div class="card">
      <div class="card-header bg-info text-white">
          <p class="h6">Question by: {{ $question->users->name }}</p>
          <h5 class="card-title text-white">Qustion: {{ $question->id }} 
            <i class="fa fa-arrow-right"></i>
            {{ $question->subject }}</h5>
      </div>
      <div class="card-body">
        {{-- Question Section --}}
        <p class="h4 bg-warning text-center text-white text-uppercase py-2">Question:</p>
        <p class="card-text text-justify">{!! $question->details !!}</p>

        <hr>
        {{-- Answer Section if question is answered, show answer otherwise show answer button --}}
            @if ($question->answered_by == NULL)
              {{-- Show button to answer <span class="badge badge-warning m-1">Not Answered</span> --}}
              <p class="text-center">
                <a href="{{ route('lecturer.question.edit', $question->id) }}" 
                  class="btn btn-info p-2 center"> Answer Now</a>
              </p>
            @else
                <p class="h4 bg-info text-center text-white text-uppercase py-1 mt-5">
                Answered by: {{ $question->repliedBy->name }} <br>
                <p class="card-text">{!! $question->answer !!}</p>
            @endif
        </p>
  </div>
  </div>
</div>
 
 @endsection